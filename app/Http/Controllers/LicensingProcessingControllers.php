<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\LicensingProcessing;
use Yajra\DataTables\DataTables;
use App\ProcessorLicensing;
//use Illuminate\Database\Eloquent\ModelNotFoundException; //Import exception.
class LicensingProcessingControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          if (request()->ajax()) {
           $licensingProcessings = LicensingProcessing::with('processorLicensing')
                                  ->where('remarks', 'Pending')
                                  ->orWhere('remarks', 'Completed')
                                  ->get();

            return Datatables::of($licensingProcessings)
                ->addColumn('date_of_distribution', function($licensingReleases) {
                  return $licensingReleases->date_of_distribution->toFormattedDateString();
                }) 

                // ->addColumn('date_processed', function($licensingReleases) {

                //   return $licensingReleases->date_processed->toFormattedDateString();

                // })
                ->addColumn('action', function ($licensingProcessing) {
                    return view('licensing-processings.partials.action', compact('licensingProcessing'));
                })
                ->make(true);
        }
        $licensedProcessors  = ProcessorLicensing::pluck('code_name', 'id');
        return view('licensing-processings.index', compact('licensedProcessors'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $processorLicensing  = ProcessorLicensing::find(request('processors')); 
        $licenseFiled        = $request->get('license_filed');
        $quantityId          = $request->get('quantity');
        $licensingProcessing = LicensingProcessing::create([
            'date_of_distribution'  => request('date_of_distribution'),
            'applicant_company'     => request('applicant_company'),
            'or_date'               => request('or_date'),
            'or_number'             => request('or_number'),
            'remarks'               =>  'Pending',
            'date_processed'        => request('date_processed'),
            'requirements'          => request('requirements'),
            'license_filed'         => implode($licenseFiled, "\n"),
            'quantity'              => implode($quantityId, "\n"),
            'reason'                => request('reason')

        ]);
        $licensingProcessing->processorLicensing()->associate($processorLicensing)->save();
        return response()->json($licensingProcessing);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LicensingProcessing $licensingProcessing)
    {
        $licensingProcessing->load('processorLicensing');
        return view('licensing-processings.show', compact('licensingProcessing', 'licensingProcessings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage(LicensingProcessing $licensingProcessing)
    {
        return view('licensing-processings.manage', compact('licensingProcessing'));
    }

    public function edit(LicensingProcessing $licensingProcessing) 
    {
        $licensedProcessors  = ProcessorLicensing::pluck('code_name', 'id');
        $licensingProcessing->load('processorLicensing');
        return view('licensing-processings.edit', compact('licensingProcessing', 'licensedProcessors'));
    }

    public function update(Request $request, LicensingProcessing $licensingProcessing)
    {

        $processorLicensing = ProcessorLicensing::find(request('processors'));
        $licenseFiled       = $request->get('license_filed');
        $quantityId         = $request->get('quantity');
        $licensingProcessing->update([
            'date_of_distribution'  => request('date_of_distribution'),
            'applicant_company'     => request('applicant_company'),
            'or_date'               => request('or_date'),
            'or_number'             => request('or_number'),
            'remarks'               =>  'Pending',
            'date_processed'        => request('date_processed'),
            'requirements'          => request('requirements'),
            'license_filed'         => implode($licenseFiled, "\n"),
            'quantity'              => implode($quantityId, "\n"),
            'reason'                => request('reason')
        ]);

         $licensingProcessing->processorLicensing()->associate($processorLicensing)->save();
         return back()->with('info', 'Licensing Processing has been update!');
    }

    public function updateLicense(Request $request, LicensingProcessing $licensingProcessing)
    {
        $licensingProcessing->update([
            'remarks'         =>   'Completed',
            'date_processed'  => request('date_processed'),
            'reason'          => request('reason'),
        ]);
        return back()->with('info', 'Update Success Licensing Processing!');
    } 
    public function manageLicenseForRelease(LicensingProcessing $licensingProcessing)
    {
        return view('licensing-processings.manage-releasing', compact('licensingProcessing'));
    }
    public function updateLicenseForRelease(Request $request, LicensingProcessing $licensingProcessing)
    {
        $licensingProcessing->update([
            'remarks'         =>   'For Release',
            'date_releasing'  => request('date_releasing'),
            'reason'          => request('reason'),
        ]);
        return back()->with('info', 'Update Success Licensing Processing!');
    }
}
