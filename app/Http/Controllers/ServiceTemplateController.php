<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceTemplate;
use Yajra\DataTables\DataTables;
class ServiceTemplateController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    public function index()
    {
         if (request()->ajax()) {
            $serviceTemplates = ServiceTemplate::all();
            return Datatables::of($serviceTemplates)
                ->addColumn('action', function ($serviceTemplate) {
                    return view('service-fees.actions.action', compact('serviceTemplate'));
                })
                ->make(true);
        }
        
    	return view('service-fees.index');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'  => 'required'
        ]);

    	$serviceTemplate = ServiceTemplate::create([

    		'name' => $request->name

    	]);

    	return redirect()->route('service-fees.show', $serviceTemplate)->with('success', 'Service has been added!');
    }

    public function edit(ServiceTemplate $serviceTemplate)
    {
        return view('service-fees.edit', compact('serviceTemplate'));
    }

    public function update(Request $request, ServiceTemplate $serviceTemplate)
    {
            $serviceTemplate->update([

                'name' => $request->name

            ]);

         return redirect('/service-with-fees')->with('info', 'Service has been updated!');
    }


    public function show(ServiceTemplate $serviceTemplate)
    {
    	 $serviceTemplate->load('feeTemplates');
    	return view('service-fees.show', compact('serviceTemplate'));
    } 

    public function destroy(ServiceTemplate $serviceTemplate) 
    {
         $serviceTemplate->load('feeTemplates')->delete();
         return back()->with('error', 'Service with Fees has been removed!');
    }

}
