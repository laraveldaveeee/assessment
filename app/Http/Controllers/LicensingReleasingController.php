<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\LicensingProcessing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class LicensingReleasingController extends Controller
{
    public function index()
    {
		if (request()->ajax()) {
	       $licensingReleases = LicensingProcessing::with('processorLicensing')
	                              ->where('remarks', 'For Release')
	                              ->orWhere('remarks', 'Receive')
	                              ->get();
	        return Datatables::of($licensingReleases)
	        	->addColumn('date_of_distribution', function($licensingReleases) {
	        		return $licensingReleases->date_of_distribution;
	        	})
	        	->addColumn('date_processed', function($licensingReleases) {
	        		return $licensingReleases->date_processed;
	        	})
	            ->addColumn('action', function ($licensingRelease) {
	                return view('licensing-release.partials.action', compact('licensingReleases', 'licensingRelease'));
	            })
	            ->make(true);
	    }
    	return view('licensing-release.index');
    }

    public function manage(LicensingProcessing $licensingRelease)
    {
    	return view('licensing-release.manage', compact('licensingRelease'));
    }

    public function update(Request $request, LicensingProcessing $licensingRelease)
    {
    			$signature 		   = $request->signature;
 				$signatureFileName = uniqid().'.png';
				$signature 		   = str_replace('data:image/png;base64,', '', $signature);
				$signature 		   = str_replace(' ', '+', $signature);
				$data 			   = base64_decode($signature); 
				$file 			   = 'public/signature/'.$signatureFileName;
				Storage::put($file,$data);
	    		$licensingRelease->update([
	    			'signature'		=> $file,
	    			'name_receiver'	=> request('name_receiver'),
	    			'date_receive'	=> request('date_receive'),
	    			'remarks'		=> 'Receive',
	    		]);
		    return back()->with('success', 'success Full upload signature');
    }
    public function show(LicensingProcessing $licensingRelease) 
    {
		$licensingRelease->load('processorLicensing');
    	return view('licensing-release.show', compact('licensingRelease'));
    }
}
