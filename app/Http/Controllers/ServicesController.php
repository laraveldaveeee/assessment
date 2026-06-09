<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service;
use Yajra\DataTables\DataTables;
class ServicesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        if (request()->ajax()) {
           $services = Service::all();
            return Datatables::of($services)
                ->addColumn('action', function ($service) {
                    return view('services.partials.action', compact('service'));
                })
                ->make(true);
        }
    	return view('services.index', compact('services'));
    }
    public function store(Request $request)
    {

    	// $this->validate(request(), [

    	// 	'name'			=> 'required',
    	// 	'roc_fee'		=> 'required|numeric',
    	// 	'app_fee'		=> 'required|numeric',
    	// 	'filing_fee'	=> 'required|numeric',
    	// 	'dst_fee'		=> 'required|numeric',

    	// ]);

    	$services = Service::create([

    		'name'			                      => request('name'),
    		'roc_fee'		                      => request('roc_fee'),
    		'app_fee'		                      => request('app_fee'),
    		'filing_fee'	                      => request('filing_fee'),
    		'dst_fee'		                      => request('dst_fee'),
            'seminar_fee'                         => request('seminar_fee'),
            'duplicate_fee'                       => request('duplicate_fee'),
            'license_fee'                         => request('license_fee'),
            'permit_possess_fee'                  => request('permit_possess_fee'),
            'construction_permit_fee'             => request('construction_permit_fee'),
            'purchase_permit_fee'                 => request('purchase_permit_fee'),
            'modification_fee'                    => request('modification_fee'),
            'possess_permit_fee'                  => request('possess_permit_fee'),
            'sell_transfer_fee'                   => request('sell_transfer_fee'),
            'inspection_fee'                      => request('inspection_fee'),
            'examination_fee'                     => request('examination_fee'),
            'registration_fee'                    => request('registration_fee'),
            'permit_fee'                          => request('permit_fee'),
            'import_permit_fee'                   => request('import_permit_fee'),
            'certificate_of_exemption'            => request('certificate_of_exemption'),
            'spectrum_users_fee'                  => request('spectrum_users_fee'),
            'certificate_of_exemption'            => request('certificate_of_exemption'),
            'release_clearance_two_units_below'   => request('release_clearance_two_units_below'),
            'release_clearance_three_units_below' => request('release_clearance_three_units_below'),
            'administrative'                      => request('administrative'),
            'all_permits_and_licenses'            => request('all_permits_and_licenses'),
            'accreditation_fee'                   => request('accreditation_fee'),
            'metro_manila'                        => request('metro_manila'),
            'highly_urbanized_cities'             => request('highly_urbanized_cities'),
            'all_other_areas'                     => request('all_other_areas'),
            'supervision_regulation_fees'         => request('supervision_regulation_fees'),
            'clearance_fee'                       => request('clearance_fee'),
            'certification_fee'                   => request('certification_fee'),
            'radio_station_license_fee'           => request('radio_station_license_fee'),
            'types'                               => request('types'), //New Or Renew

    	]);

        return response()->json($services);

    	//return back()->with('success', 'Services has been added!');

    }

    public function edit(Request $request, Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $this->validate(request(), [
            'label'         => 'required',
            'name'          => 'required',
            'roc_fee'       => 'required|numeric',
            'app_fee'       => 'required|numeric',
            'filing_fee'    => 'required|numeric',
            'dst_fee'       => 'required|numeric',
        ]);
        $service->update([
            'label'         => request('label'),
            'name'          => request('name'),
        ]);
        return redirect('/services')->with('info', 'Service has been updated!');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function feesIndex(Service $service)
    {
        return view('services.add-fees', compact('service'));
    }

    public function addFees(Request $request, Service $service)
    {
        $service->update([
            'roc_fee'       => request('roc_fee'),
            'app_fee'       => request('app_fee'),
            'filing_fee'    => request('filing_fee'),
            'dst_fee'       => request('dst_fee'),
        ]);
        return back()->with('success', 'Fees has been added!');
    }
}
