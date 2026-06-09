<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Assessment;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CollectionExport;
class MonthlyReportsController extends Controller
{
    
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments = Assessment::query()->with('serviceFees');

        if (request()->has('month')) {
            $assessments->whereMonth('or_date', \Carbon\Carbon::parse(request('month'))->format('m'))
                        ->whereYear('or_date', \Carbon\Carbon::parse(request('month'))->format('Y'));
        }

        if (request()->has('from_undeposited') && request()->has('to_undeposited')) {
            $undepositAssessments = Assessment::with('serviceFees')
                ->whereMonth('or_date', \Carbon\Carbon::parse(request('month'))->format('m'))
                ->whereYear('or_date', \Carbon\Carbon::parse(request('month'))->format('Y'))
                ->orderBy('or_date')
                ->orderBy('or_no');
            $undepositAssessments = $undepositAssessments->whereBetween('or_date', [request('from_undeposited'), request('to_undeposited')])->get();
        }
        $assessments = $assessments->orderBy('or_date')->orderBy('or_no')->get();

        return view('cashier-dashboard.monthly-reports.index', compact('assessments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        $rocFeeSumTotal = 0;
        $licenseFeeSumTotal = 0;
        $modFeeSumTotal = 0;
        $registrationFeeSumTotal = 0;
        $adminFeeSumTotal = 0;
        $surchargeFeeSumTotal = 0;
        $permitFeeSumTotal = 0;
        $inspectionFeeSumTotal = 0;
        $filingFeeSumTotal = 0;
        $sufFeeSumTotal = 0;
        $dstFeeSumTotal = 0;
        $totalFeeSumTotal = 0;
        $depositDstFeeSumTotal = 0; 

        $assessments = Assessment::with('serviceFees')
                    // ->whereBetween('or_date', [request('from'), request('to')])
                    ->whereMonth('or_date', \Carbon\Carbon::parse(request('month'))->format('m'))
                    ->whereYear('or_date', \Carbon\Carbon::parse(request('month'))->format('Y'))
                    ->orderBy('or_date')
                    ->orderBy('or_no')
                    ->get()
                    ->groupBy('or_date');

        //Get the OR No.
        $maxOrRanges = Assessment::with('serviceFees')
                    //->whereBetween('or_date', [request('from'), request('to')])   
                    ->whereMonth('or_date', \Carbon\Carbon::parse(request('month'))->format('m'))
                    ->whereYear('or_date', \Carbon\Carbon::parse(request('month'))->format('Y'))
                    ->orderBy('or_date')
                    ->orderBy('or_no') 
                    ->get();

        // get all records where date requested, then sum total
        $sumTotals = Assessment::with('serviceFees')
                    // ->whereBetween('or_date', [request('from'), request('to')])   
                    ->whereMonth('or_date', \Carbon\Carbon::parse(request('month'))->format('m'))
                    ->whereYear('or_date', \Carbon\Carbon::parse(request('month'))->format('Y'))
                    ->orderBy('or_date')
                    ->orderBy('or_no')
                    ->get();

                    $undepositLicenseFeeSumTotal = 0;
                    $undepositRocSumTotal = 0;
                    $undepositLFSumTotal = 0;
                    $undepositSurchargeSumTotal = 0;
                    $undepositPermitFeesSumTotal = 0;
                    $undepositInsfectionFeesSumTotal = 0;
                    $undepositFilingFeesSumTotal = 0;
                    $undepositSUFSumTotal = 0;
                    $undepositDSTSumTotal = 0;
                    $undepositTotalSumTotal = 0;
                    $undepositedSumTotal = 0;

        $undepositAssessments = Assessment::with('serviceFees')
                    ->whereMonth('or_date', \Carbon\Carbon::parse(request('month'))->format('m'))
                    ->whereYear('or_date', \Carbon\Carbon::parse(request('month'))->format('Y'))
                    ->orderBy('or_date')
                    ->orderBy('or_no');

        $undepositAssessments = $undepositAssessments->whereBetween('or_date', [request('from_undeposited'), request('to_undeposited')])->get();
        //GET SUM TOTAL FOR THE UNDEPOSITED


        foreach ($undepositAssessments as $key => $sumUndepositAssessment) {
            $undepositLicenseFeeSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'License Fee')->sum('total');
            $undepositRocSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'ROC Fee')->sum('total');
            $undepositLFSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'License Fee')->sum('total');
            $undepositSurchargeSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'Surcharge ROC Fee')->sum('total') + $sumUndepositAssessment->serviceFees->where('name_fees', 'Surcharge License Fee')->sum('total');

            $undepositPermitFeesSumTotal +=   $sumUndepositAssessment->serviceFees->where('name_fees', 'Permit Fee')->sum('total') + $sumUndepositAssessment->serviceFees->where('name_fees', 'Permit Poss Fee')->sum('total');
            $undepositInsfectionFeesSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'Inspection Fee')->sum('total');
            $undepositFilingFeesSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'Filing Fee')->sum('total');
            $undepositSUFSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'SUF')->sum('total');
            $undepositDSTSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'DST')->sum('total');

            //Get all total Undeposited
            $undepositTotalSumTotal += $sumUndepositAssessment->serviceFees->where('name_fees', 'ROC Fee')->sum('total') +  $sumUndepositAssessment->serviceFees->where('name_fees', 'License Fee')->sum('total') + $sumUndepositAssessment->serviceFees->where('name_fees', 'Surcharge ROC Fee')->sum('total') + $sumUndepositAssessment->serviceFees->where('name_fees', 'Surcharge License Fee')->sum('total') +  $sumUndepositAssessment->serviceFees->where('name_fees', 'Permit Fee')->sum('total') + $sumUndepositAssessment->serviceFees->where('name_fees', 'Permit Poss Fee')->sum('total') +  $sumUndepositAssessment->serviceFees->where('name_fees', 'Inspection Fee')->sum('total') + $sumUndepositAssessment->serviceFees->where('name_fees', 'Filing Fee')->sum('total') +  $sumUndepositAssessment->serviceFees->where('name_fees', 'SUF')->sum('total') + $sumUndepositAssessment->serviceFees->where('name_fees', 'DST')->sum('total');


            //  
            $undepositedSumTotal = $undepositDSTSumTotal - $undepositTotalSumTotal;
        }



        //Get the Subtotal every day
        $sumSubTotal = 0;


        //GET SUM TOTAL FOR THE MONTH
        foreach ($sumTotals as $key => $sum) {

            $rocFeeSumTotal += $sum->serviceFees->where('name_fees', 'ROC Fee')->sum('total'); 
            $licenseFeeSumTotal += $sum->serviceFees->where('name_fees', 'License Fee')->sum('total');
            $modFeeSumTotal += $sum->serviceFees->where('name_fees', 'Mod Fee')->sum('total');
            $registrationFeeSumTotal += $sum->serviceFees->where('name_fees', 'Registration Fee')->sum('total');
            $adminFeeSumTotal += $sum->serviceFees->where('name_fees', 'Admin Fee')->sum('total');
            $surchargeFeeSumTotal += $sum->serviceFees->where('name_fees', 'Surcharge ROC Fee')->sum('total') + $sum->serviceFees->where('name_fees', 'Surcharge License Fee')->sum('total');
            $permitFeeSumTotal += $sum->serviceFees->where('name_fees', 'Permit Fee')->sum('total') + $sum->serviceFees->where('name_fees', 'Permit Poss Fee')->sum('total');
            $inspectionFeeSumTotal += $sum->serviceFees->where('name_fees', 'Inspection Fee')->sum('total');
            $filingFeeSumTotal += $sum->serviceFees->where('name_fees', 'Filing Fee')->sum('total');
            $sufFeeSumTotal += $sum->serviceFees->where('name_fees', 'SUF')->sum('total');
            $dstFeeSumTotal += $sum->serviceFees->where('name_fees', 'DST')->sum('total');

            $totalFeeSumTotal += $sum->serviceFees->sum('total');

            $depositDstFeeSumTotal += $sum->serviceFees->where('name_fees', 'DST')->sum('total') - $sum->serviceFees->sum('total');
            

            //Get the subTotal Every OR DATE
            $sumSubTotal += $sum->serviceFees->where('name_fees', 'DST')->sum('total');


        }

        return view('cashier-dashboard.monthly-reports.income', [
            'assessments'   => $assessments,
            'sumSubTotal'   => $sumSubTotal,
            'maxOrRanges'   => $maxOrRanges,
            'rocFeeSumTotal' => $rocFeeSumTotal,
            'licenseFeeSumTotal' => $licenseFeeSumTotal,
            'modFeeSumTotal' => $modFeeSumTotal,
            'registrationFeeSumTotal' => $registrationFeeSumTotal,
            'adminFeeSumTotal' => $adminFeeSumTotal,
            'surchargeFeeSumTotal' => $surchargeFeeSumTotal,
            'permitFeeSumTotal' => $permitFeeSumTotal,
            'inspectionFeeSumTotal' => $inspectionFeeSumTotal,
            'filingFeeSumTotal' => $filingFeeSumTotal,
            'sufFeeSumTotal' => $sufFeeSumTotal,
            'dstFeeSumTotal' => $dstFeeSumTotal,
            'totalFeeSumTotal' => $totalFeeSumTotal,
            'depositDstFeeSumTotal' => $depositDstFeeSumTotal,
            'undepositRocSumTotal' => $undepositRocSumTotal,
            'undepositSurchargeSumTotal' => $undepositSurchargeSumTotal,
            'undepositPermitFeesSumTotal' => $undepositPermitFeesSumTotal,
            'undepositInsfectionFeesSumTotal' => $undepositInsfectionFeesSumTotal,
            'undepositFilingFeesSumTotal' => $undepositFilingFeesSumTotal,
            'undepositSUFSumTotal' => $undepositSUFSumTotal,
            'undepositDSTSumTotal' => $undepositDSTSumTotal, 
            'undepositTotalSumTotal' => $undepositTotalSumTotal, 
            'undepositedSumTotal' => $undepositedSumTotal, 
            'undepositLicenseFeeSumTotal' => $undepositLicenseFeeSumTotal, 
        ]);
       //return Excel::download(new CollectionExport, 'collections.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
