<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ProcessorLicensing;
class ProcessorsLicensingController extends Controller
{
    public function index() 
    {
    	$processorsLicensings = ProcessorLicensing::all();
    	return view('licensing-processings.processors.index', compact('processorsLicensings'));
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'code_name'	=> 'required',
    		'fullname'	=> 'required'
    	]);
    	ProcessorLicensing::create([
    		'code_name'  => request('code_name'),
    		'fullname'   => request('fullname')
    	]);
    	return back()->with('success', 'Processors of Licensing has been added!');
    }

    public function show(ProcessorLicensing $processorsLicense)
    {
         $processorsLicense->load(['licensingProcessings']);
         return view('licensing-processings.processors.show', compact('processorsLicense'));
    }
}
