<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Carrier;
use App\Assessment;
use App\Applicant;
use App\NewCarrier;
use App\User;
use App\Events\CarrierSent;
use Yajra\DataTables\DataTables;
use App\Exports\CarriersExport;
use Maatwebsite\Excel\Facades\Excel;

class CarriersController extends Controller
{
    public function index()
    {
        return view('carriers.index');
    }

    public function store(Request $request) 
    {
        $carrierId   = $request->carrierId;
        $applicant   =   Carrier::create([
                        'applicant' => $request->applicant, 
                        'address'   => $request->address
                    ]);
        $assessment = $applicant->assessments()->create([
            'user_id'              => auth()->user()->id,
            'carrier_status'       => 'For Payment', //Direct to the Cashier
            'soa_number'           => $request->soa_number,
            'class_station'        => $request->class_station,
            'class_station'        => $request->class_station,
            'remarks'              => $request->remarks,
            'due_date'             => $request->due_date,
        ]);
        $items = collect($request->items);
        foreach ($items as $item) {
            $assessment->categories()->create([
                'description' => $item['description'],
                'amount'      => $item['amount'],
            ]);
        }

        broadcast(new CarrierSent($assessment));
        return $assessment;
    }

    public function carriers()
    {
         if (request()->ajax()) {
            $carriers = Assessment::with('carrier')->where('carrier_status', 'Paid')
                                    ->get();
             return Datatables::of($carriers)
                ->addColumn('action', function ($carrier) {
                    return view('carriers.partials.action', compact('carrier'));
                })
                ->make(true);
         }
        
        return view('carriers.carrier-lists');
    }

    public function showDetails(Assessment $carrier)
    {
         $assessment = $carrier->load('categories');    
         return view('carriers.show', compact('assessment'));
    }

    public function destroy(Assessment $carrier)
    {
         $carrier->load('categories')->delete(); 
         return back()->with('error', 'Carrier has been removed!');
    }


    //New  Carrier
    public function newCarrier()
    {

       

        if (request()->ajax()) {
             $newCarriers = NewCarrier::all();
             return Datatables::of($newCarriers)
                ->addColumn('action', function ($newCarrier) {
                    return view('carriers.partials.new-action', compact('newCarrier'));
                })
                ->make(true);
         }
        

        $groupByCarriers = NewCarrier::groupBy('applicant_company')->get();
        return view('carriers.new-carrier', compact('groupByCarriers'));
    }

    public function newCarrierStore(Request $request)
    { 
        $this->validate(request(), [
            //'applicant_company' => 'required',
            'soa_number' => 'required',
            'address' => 'required',
            'remarks' => 'required',
            'due_date' => 'required',
            'assessed_by' => 'required',

        ]);

        if (request()->has('existing_company')) {

                $newCarrier = NewCarrier::create([
                    'applicant_company' => request('existing_company'),
                    'soa_number' => request('soa_number'),
                    'address' => request('address'),
                    'remarks' => request('remarks'),
                    'due_date' => \Carbon\Carbon::parse(request('due_date')),
                    'status'    => 'Pending',
                    'assessed_by'    =>  request('assessed_by'),
                    'updated_at'    => NULL,
                ]);

            } else {

                 $newCarrier = NewCarrier::create([
                    'applicant_company' => request('new_company'),
                    'soa_number' => request('soa_number'),
                    'address' => request('address'),
                    'remarks' => request('remarks'),
                    'due_date' => \Carbon\Carbon::parse(request('due_date')),
                    'status'    => 'Pending',
                    'updated_at'    => NULL,
                ]);
            }
  
        return redirect()->route('carriers.new-carrier-assessment', $newCarrier)->with('success', 'Applicant has been added!');
    }

    public function showNewCarrier(NewCarrier $newCarrier)
    {
        return view('carriers.new-carrier-assessment', compact('newCarrier'));
    }

    public function updateNewCarrier(NewCarrier $newCarrier, Request $request)
    {

        $this->validate(request(), [
            'class_stations'    => 'required',
        ]);

        $licensedFee = $request->license_fee;
        $inspectionFee = $request->inspection_fee;
        $dst = $request->dst; 
        $sufTotal = $request->amount; 

        //Get the total Class then sum
        $totalClass = $licensedFee + $inspectionFee + $dst + $sufTotal;
         $newCarrier->update([
            'class_stations'    => request('class_stations'),
            'license_fee'    => $licensedFee,
            'inspection_fee'    => $inspectionFee,
            'dst'    => $dst,
            'fees'    => request('fees'),
            'amount'    => request('amount'), 
            'total_class'   => $totalClass,
        ]);
        return back()->with('info', 'Carrier has been added!');
    }

    public function filtering()
    { 

       $newCarrier    = NewCarrier::first();
       $classStations = NewCarrier::query();  
 
        if (request()->has('from') && request()->has('to')) { 
             $classStations->whereBetween('or_date', [request('from'), request('to')])->get();
       
        }

                // Optional: if you also want filter by applicant
        if (request()->filled('applicant_company')) {
            $classStations->where('applicant_company', 'like', '%' . request('applicant_company') . '%');
        }

       if (request('class_stations')) {

            $classStations->where('class_stations', 
                           request('class_stations'));
        }

  

        $sumAmounts = NewCarrier::whereBetween('or_date', [request('from'), request('to')])    
                    ->orderBy('or_date')
                    ->orderBy('or_no')
                    ->get();  



        if (request('fees')) {

            $classStations->where('fees', request('fees'));
        }

        $classStations = $classStations->orderBy('or_date')->orderBy('or_no')->get();  


        return view('carriers.carrier-filter',[

            'classStations' => $classStations, 
            'newCarrier'    => $newCarrier, 
            'sumAmounts'    => $sumAmounts,  
        ]);
    }

    public function updateStatus(NewCarrier $newCarrier)
    {
        $newCarrier->update([
            'status' => 'For Payment'
        ]);

        return redirect('/new-carrier')->with('success', 'Proceed Success!');
    }  

    public function destroyNewCarrier(NewCarrier $newCarrier)
    {
        $newCarrier->delete();
        return back()->with('error', 'New Carrier has been removed!'); 
    }  


        /**
    * Download Excel for NewCarriers with optional filters
    */
public function downloadNewCarriers(Request $request)
{
    $filters = [
        'applicant_company' => $request->input('applicant_company'),
        'class_stations'    => $request->input('class_stations'),
        'fees'              => $request->input('fees'),
    ];

    return Excel::download(
        new CarriersExport(
            $request->input('from'),
            $request->input('to'),
            $filters
        ),
        'carriers_export_' . now()->format('Ymd_His') . '.xlsx'
    );
}




        
}
