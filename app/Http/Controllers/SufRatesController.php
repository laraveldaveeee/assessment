<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service;
use App\ServiceTemplate;
use Yajra\DataTables\DataTables;
use App\SufRate;
use DB;
class SufRatesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        if (request()->ajax()) {
            $sufRates = SufRate::all();
            return Datatables::of($sufRates)
                ->addColumn('action', function ($sufRate) {
                    return view('suf-rates.partials.action', compact('sufRate'));
                })
                ->make(true);
        }
    	$services = ServiceTemplate::pluck('name', 'id');
    	return view('suf-rates.index', compact('services'));
    }
    public function store(Request $request)
    { 
        $this->validate(request(),[
            'suf_name'  => 'required',
            'rates' => 'required|numeric'
        ]);
 		$sufrate = SufRate::create([
 			'suf_name'	=> $request->suf_name,
 			'rates'     => $request->rates,
 		]);
        $sufrate->serviceTemplates()->attach(request('services'));
        return response()->json($sufrate);
    }
    public function edit(SufRate $sufRate)
    {
        $sufRate->load(['serviceTemplates.feeTemplates']);
        $services = ServiceTemplate::pluck('name', 'id');
        return view('suf-rates.edit', [
            'sufRate'   => $sufRate,
            'services'  => $services
        ]);
    }
    public function update(Request $request, SufRate $sufRate) 
    {
         $sufRate->update([
            'suf_name'  => $request->suf_name,
            'rates' => $request->rates,
        ]);
        $sufRate->serviceTemplates()->sync(request('services'));
        return back()->with('info', 'SUF Rate has been updated!');
    }
    public function show(SufRate $sufRate)
    {
        $sufRate->load(['serviceTemplates.feeTemplates']);
        return view('suf-rates.show', compact('sufRate'));
    }
}
