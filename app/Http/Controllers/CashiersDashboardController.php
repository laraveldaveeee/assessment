<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Applicant;
use App\Assessment;
use App\Carrier;
use App\NewCarrier;
use App\Category;
use Yajra\DataTables\DataTables;
use App\IdGenerator;
class CashiersDashboardController extends Controller
{
    public function index()
    {
     if (request()->ajax()) {
            $assessments = Assessment::with('applicant')
                                    ->where('status', 'Pending')
                                    ->orWhere('status', 'For Payment')
                                    ->withCount(['applicant'])
                                    ->get();
            return Datatables::of($assessments)
                ->addColumn('action', function ($assessment) {
                    return view('cashier-dashboard.partials.action', compact('assessment'));
                })
                ->make(true);
        }
        return view('cashier-dashboard.index');
    }

    public function cashierApi()
    {
        $assessments = Assessment::with('applicant')->where('status', 'For Payment')
                                    ->withCount(['applicant'])
                                    ->get();
        return $assessments;
    }

    public function show(Assessment $assessment)
    {
        $assessment->load('applicant', 'assessmentServices.serviceFees', 'fees');
        return view('cashier-dashboard.show', compact('assessment'));
    }
    public function update(Assessment $assessment)
    {
        $this->validate(request(), [
            //'or_no'         => 'required|numeric',
            'or_date'       => 'required'
        ]);

          $order_of_payment = IdGenerator::generate([
            'table' => 'assessments',
            'field' => 'op_no', //Order of Payment
            'length' => 13,
            'prefix' => date('Y') . '-' . date('m') . '-',  
            'reset_on_prefix_change' => true
        ]);

        $mytime = \Carbon\Carbon::now();
        $mytime->timezone('Asia/Manila');
        $mytime->format('h:i A');

        $assessment->update([
            'user_cashier_id'   => auth()->id(),
            'status'    => 'Paid',  
            'or_no'     => request('or_no'),
            'op_no'     => $order_of_payment,
            'or_date'   => request('or_date'),
            'cashier_time_update'    => $mytime,
            'date_of_treasury'  => request('date_of_treasury'),
            'recieved' => request('recieved'),
            'treasury' => request('treasury'),
        ]);  
        //Session::flash('statusCode', 'info');
        if (auth()->user()->id == 9) {
            return back()->with('alert-dsg', "The OR NO $assessment->or_no  has been added!");
        } 
        return back()->with('alert-mog', "The OR NO $assessment->or_no  has been added!");
    }
    public function applicants() 
    {
        if (request()->ajax()) {
            // $applicants = Applicant::with(['assessments', 'latestAssessment' => function($q) {
            //     $q->where('status', 'Paid');
            // }])->get();
          $applicants = Applicant::with('assessments', 'latestAssessment')->latest();
          return Datatables::of($applicants)
            ->addColumn('action', function ($applicant) {
                return view('cashier-dashboard.partials.show-action', compact('applicant'));
            })
            ->make(true);
        }
        return view('cashier-dashboard.applicants.index');
    }
    public function showApplicantDetails(Applicant $applicant)
    {
        $applicant->load(['assessments' => function ($query) {
            $query->where('status', 'Paid');
        }]);
        return view('cashier-dashboard.applicants.show', compact('applicant'));
    }
    public function showApplicantAssessment(Assessment $assessment)
    {
        return view('cashier-dashboard.applicants.show-assessment', compact('assessment'));
    }
    public function backToAssessor(Assessment $assessment)
    {
        $assessment->update([
            'status'    => 'Verified'
        ]);
        return back()->with('error', 'Oops! Something went wrong. Please Verified to the assessor!');
    }

    //CARRIER
    public function carrier()
    {
             $carriers = Assessment::with('carrier')->where('carrier_status', 'For Payment')
                                    ->latest()
                                    ->get();
        //return $carriers;
        return view('cashier-dashboard.carriers.carrier-pending', compact('carriers'));
    }

    public function carrierApi()
    {
        $assessments = Assessment::with('carrier')->where('carrier_status', 'For Payment')
                                  ->latest()
                                  ->get();
        return $assessments;
    }

    public function carrierLists()
    { 
       if (request()->ajax()) {
            $carriers = Assessment::with('carrier')->where('carrier_status', 'Paid')
                                    ->latest()
                                    ->get();
             return Datatables::of($carriers)
                            ->addColumn('action', function ($carrier) {
                                return view('cashier-dashboard.carriers.modal.action', compact('carrier'));
                            })
                            ->make(true);
         } 
        return view('cashier-dashboard.carriers.carrier-lists');
    }

    public function manageCarrier(Assessment $assessment)
    {
        $assessment->load(['categories', 'carrier']);
        return view('cashier-dashboard.carriers.manage-carrier', compact('assessment'));
    }

    public function updateCarrierOR(Assessment $assessment)
    {
         $this->validate(request(), [
            //'or_no'         => 'required|numeric',
            'or_date'       => 'required'
        ]);

        $order_of_payment = IdGenerator::generate([
            'table' => 'assessments',
            'field' => 'op_no', //Order of Payment
            'length' => 13,
            'prefix' => date('Y') . '-' . date('m') . '-',  
            'reset_on_prefix_change' =>  true
        ]);
        $assessment->update([
            'carrier_status'    => 'Paid',  
            'or_no'     => request('or_no'),
            'or_date'   => request('or_date'),
            'op_no'     => $order_of_payment, 
        ]);  

         if (auth()->user()->id == 9) {
            return back()->with('alert-dsg', "The OR NO $assessment->or_no  has been added!");
        } 
        return back()->with('alert-mog', "The OR NO $assessment->or_no  has been added!");
    }

    public function showCarrierAssessment(Assessment $carrier)
    {
         $assessment = $carrier->load('categories');
         return view('cashier-dashboard.carriers.carrier-show', compact('assessment'));
    }

    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return $applicant;
        return back()->with('error', 'Applicant has been removed!');
    }


    // New Carrier

    public function newCarriersPending()
    {

        if (request()->ajax()) {
             
             $newCarriers = NewCarrier::where('status', 'For Payment')->get();

             return Datatables::of($newCarriers)
                            ->addColumn('action', function ($newCarrier) {
                                return view('cashier-dashboard.partials.pending-carrier-action', compact('newCarrier'));
                            })
                            ->make(true);
         } 
 

        return view('cashier-dashboard.carriers.new-carrier-pending');
    }

    public function newCarrierManage(NewCarrier $newCarrier)
    {
         return view('cashier-dashboard.carriers.new-carrier-manage', compact('newCarrier'));
    }

    public function newCarrierUpdate(NewCarrier $newCarrier)
    {
        // $this->validate(request(), [
        //     'or_no' =>  'required',
        //     'or_date' =>  'required',
        //     'status' =>  'required',
        // ]);

        $time = \Carbon\Carbon::now();
        $time->timezone('Asia/Manila');
        $time->format('h:i A');

        $newCarrier->update([

            'or_no'  => request('or_no'),
            'or_date'  => request('or_date'),
            'issued_or'  => auth()->user()->name,
            'issued_time'  => $time,
            'status'    => 'Paid',
        ]);

        return back()->with('info', 'New Carrier has been added OR #');
    }

    public function newCarrierLists()
    {
        
         if (request()->ajax()) {
             
             $newCarriers = NewCarrier::where('status', 'Paid')->get();

             return Datatables::of($newCarriers)
                            ->addColumn('action', function ($newCarrier) {
                                return view('cashier-dashboard.partials.new-carrier-action', compact('newCarrier'));
                            })
                            ->make(true);
         } 


        return view('cashier-dashboard.carriers.new-carrier-lists');
    }

}
