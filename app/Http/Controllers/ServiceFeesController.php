<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ServiceFee;
use App\ServiceTemplate;
use App\FeeTemplate;
class ServiceFeesController extends Controller
{
    public function index()
    {
    	$serviceTemplates = ServiceTemplate::with('feeTemplates')->get();
    	return view('service-fees.index', compact('serviceTemplates'));
    }

    public function store(Request $request, ServiceTemplate $serviceTemplate)
    {
    	$this->validate(request(), [
    		'name_fees'	   => 'required',
    		'amount'	   => 'required|numeric',
    	]);
        $isEnabled             = request('enabled_year_computation') ? true : false;
        $isEnabledSurcharge    = request('enabled_surcharge') ? true : false;
        $isEnabledDstPortable  = request('enabled_portable_computation') ? true : false;
        $isEnabledDstDefault   = request('enabled_dst_default') ? true : false;
        $isEnabledLicensedFee  = request('enabled_licensed_fee_computation') ? true : false;
    	$serviceTemplate->feeTemplates()->create([
    		'code'					              => request('code'),
    		'name_fees' 			              => request('name_fees'),
    		'amount'				              => request('amount'),
    		'enabled_year_computation'            => $isEnabled ?? false,
            'enabled_surcharge'                   => $isEnabledSurcharge,
            'enabled_portable_computation'        => $isEnabledDstPortable,
            'enabled_dst_default'                 => $isEnabledDstDefault,
            'enabled_licensed_fee_computation'    => $isEnabledLicensedFee,
    	]);
    	return back()->with('success', 'Service Fee has been added!');
    }

    public function edit(FeeTemplate $row)
    {
    	return view('service-fees.edit-fees', compact('row'));
    }

    public function update(Request $request, FeeTemplate $row)
    {
 
    	if (request('enabled_year_computation')) { 
			$isEnabled = true; 
		} 
        $enabledSurcharge   = request('enabled_surcharge') ? true : false;
        $enabledDstPortable = request('enabled_portable_computation') ? true : false;
        $isEnabledDstDefault  = request('enabled_dst_default') ? true : false;
        $isEnabledLicensedFee  = request('enabled_licensed_fee_computation') ? true : false;
    	$serviceTemplate = $row->update([
    		'code'					         => request('code'),
    		'name_fees' 			         => request('name_fees'),
    		'amount'				         => request('amount'),
    		'enabled_year_computation'       => $isEnabled ?? false,
            'enabled_surcharge'              => $enabledSurcharge,
            'enabled_portable_computation'   => $enabledDstPortable,
            'enabled_dst_default'                 => $isEnabledDstDefault,
            'enabled_licensed_fee_computation'    => $isEnabledLicensedFee,
    	]);
    	// return redirect()->route('service-fees.show', $serviceTemplate)->with('info', 'Service Fee has been updated!');
       return back()->with('info', 'Service Fee has been update!');
    }

    public function destroy(FeeTemplate $row) 
    {       
         $row->load(['serviceTemplate.feeTemplates']);

        $row->delete();
        return back()->with('error', 'Fee has been removed!');
         //return back();
    }
}
