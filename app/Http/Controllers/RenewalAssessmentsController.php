<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Applicant;
use App\Assessment;
use App\AssessmentService;
use App\Service;
use App\User;
use App\SufRate;
use App\ServiceFee;
use App\IdGenerator;
use App\ServiceTemplate;
class RenewalAssessmentsController extends Controller
{
    /**
     * Get the surcharge with Fee.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSurcharge(ServiceFee $fee)
    {
        return response()->json($fee);
    }

    /**
     * Add Surcharge.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSurcharge(ServiceFee $surchargeFee)
    {
        $surchargeFee->load('assessmentService');
        $surcharge = request('surcharge') * 0.01;
        $amount    = $surchargeFee->amount;
        $qty       = $surchargeFee->assessmentService->qty;
        $total     = $surcharge * $qty * $amount;
        $name      = $surchargeFee->name_fees;
        if ($surchargeFee->enabled_suf_surcharge) {
            $name = "(SUF Surcharge)";
        }
        $serviceFee = ServiceFee::create([
            'assessment_service_id' => $surchargeFee->assessment_service_id,
            'name_fees'             => 'Surcharge '.$name,
            'surcharge_amount'      => $surcharge,
            'amount'                => $amount,
            'total'                 => $total,
        ]);
        return response()->json($serviceFee);
    }
    public function convertFraction($str) {
        $str_buffer = "";
        $str_char = "";
        $str_len = strlen($str);
        // return $str_len !== 1 ? 'frac' : $str;
        // return is_numeric ($str) ? 'true' : 'false';
        // return $str_len != 1 ? $str : 'not fraction';
        $frac_whole = 0;
        $frac_numer = 0;
        $frac_deno = 0;
        if ($str_len === 0) {
            return null;
        }
        if ($str_len !== 1) {
            for ($i=0; $i < $str_len; $i++) {
                $str_char = $str[$i];
                if ($str_char == " ") {
                    if($frac_whole == 0) {
                        $frac_whole = $str_buffer;          
                    }
                    $str_buffer = "";
                } elseif($str_char == "/") {
                    if ($frac_numer == 0){
                        $frac_numer = $str_buffer;
                    }
                    $str_buffer = "";
                } else {
                    $str_buffer .= $str_char;
                }
            }
            $frac_deno = $str_buffer;
            if ($frac_numer > $frac_deno){
                $frac_whole += floor($frac_numer / $frac_deno);
                $frac_numer = $frac_numer % $frac_deno;
            }
            return $frac_whole + $frac_numer / $frac_deno;
        }
        return $str;
    }
    /**
     * Store a newly store resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Assessment $assessment, Request $request)
    {
        // $year              = $request->yr;
        // $quantity          = $request->qty;
        // $convertedYear     = $this->convertFraction($year);
        // $serviceTemplate   =  ServiceTemplate::with('feeTemplates')->find(request('services'));

        // $assessmentService = $assessment->assessmentServices()->create([
        //     'name'                                => $serviceTemplate->name,
        //     'qty'                                 => $quantity,
        //     'yr'                                  => $year,
        // ]);

        // foreach ($serviceTemplate->feeTemplates as $feeTemplate) {
        //     $amount     = $feeTemplate->amount;
        //     $total      = $convertedYear * $quantity * $amount;

        //     if (! $feeTemplate->enabled_year_computation) {
        //         $total  = $quantity * $amount;
        //     }
 
        //     $assessmentService->serviceFees()->create([
        //         'code'       => $feeTemplate->code,
        //         'name_fees'  => $feeTemplate->name_fees,
        //         'amount'     => $amount,
        //         'total'      => $total,
        //         'enabled_year_computation' => $feeTemplate->enabled_year_computation,
        //         'enabled_surcharge'        => $feeTemplate->enabled_surcharge,

        //     ]);
        // }


        $year              = $request->yr;
        $quantity          = $request->qty;
        $convertedYear     = $this->convertFraction($year);
        $serviceTemplate   =  ServiceTemplate::with('feeTemplates')->find(request('services'));
        $assessmentService = $assessment->assessmentServices()->create([
            'name'                                => $serviceTemplate->name,
            'qty'                                 => $quantity,
            'yr'                                  => $year,
            'bandwidth'                           => request('bandwidth'),
            'no_of_station'                       => request('no_of_station'),
        ]);
        if ($sufRate = request('suf_rates')) {
            $bandwidth      = request('bandwidth');
            $noOfStation    = request('no_of_station');
            $sufRate        = SufRate::find($sufRate);
            $rate           = $sufRate->rates;
            $fee            = $rate * $bandwidth * $noOfStation;
            $total          = $fee * $convertedYear * $quantity;
            $assessmentService->sufRate()->associate($sufRate)->save();
            $assessmentService->serviceFees()->create([
                'name_fees'  => 'SUF',
                'amount'     => $fee,
                'total'      => $total,
                'enabled_year_computation' => true,
                'enabled_suf_surcharge'    => true,
            ]);
        }

        foreach ($serviceTemplate->feeTemplates as $feeTemplate) {
            $amount     = $feeTemplate->amount;
            $total      = $convertedYear * $quantity * $amount;
            if (! $feeTemplate->enabled_year_computation) {
                $total  = $quantity * $amount;
            }
            if ($enabledPortable = $feeTemplate->enabled_portable_computation) {
                $dstTotal = ceil($quantity / 25);
                $total    = $dstTotal * $amount;
            }
            if ($enabledDstDefault = $feeTemplate->enabled_dst_default) {
                $dstDefaultTotal = 1;
                $total = $dstDefaultTotal * $amount;
            }

            if ($isEnabledLicensedFee = $feeTemplate->enabled_licensed_fee_computation) {
                $licensedFee          = $convertedYear * $quantity;
                $amount               = $amount * $noOfStation;
                $total                = $licensedFee * $amount;
            }
            $assessmentService->serviceFees()->create([
                'code'       => $feeTemplate->code,
                'name_fees'  => $feeTemplate->name_fees,
                'amount'     => $amount,
                'total'      => $total,
                'enabled_year_computation'     => $feeTemplate->enabled_year_computation,
                'enabled_surcharge'            => $feeTemplate->enabled_surcharge,
                'enabled_portable_computation' => $enabledPortable ? $enabledPortable : 0,
                'enabled_dst_default'          => $enabledDstDefault ? $enabledDstDefault : 0,
                'enabled_licensed_fee_computation'   => $isEnabledLicensedFee ? $isEnabledLicensedFee : 0,
            ]);
        }
        return back()->with('success', 'Assessment has been added!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function duplicateAssessment(Request $request, Assessment $assessment)
    { 

         $soaNo = IdGenerator::generate([
            'table'  => 'assessments',
            'field'  => 'soa_no', 
            'length' => 9,
            // 'prefix' => '-'.date('y'),
            'prefix' => date('y') . '-',
            'reset_on_prefix_change' => true
        ]);


        $assessment = Assessment::with('applicant', 'assessmentServices.serviceFees')->findOrFail(request('assessment'));
        if ($assessment->status == 'Verified' || $assessment->status == 'For Review' || $assessment->status == 'Pending' || $assessment->status == 'For Payment') 
        {
             $serviceTemplate   =  ServiceTemplate::with('feeTemplates')->find(request('services'));
            return view('applicants.show-duplicate-assessment', compact('assessment', 'services')); 
        }
        $dupplicateAssessment = Assessment::create([
            'user_id'       => $assessment->user_id,
            'applicant_id'  => $assessment->applicant_id,
             'notes'         => $assessment->notes,
            'status'        => 'Verified',
             'soa_no'        => $soaNo,
        ]);
        foreach ($assessment->assessmentServices as $assessmentService) {
            $year              = $assessmentService->yr;
            $quantity          = $assessmentService->qty;
            $bandwidth         = $assessmentService->bandwidth;
            $noOfStation       = $assessmentService->no_of_station;
            $sufRate           = $assessmentService->suff_rate_id;
            $newAssessmentService = $dupplicateAssessment->assessmentServices()->create([
                'name'                                => $assessmentService->name,
                'qty'                                 => $quantity,
                'yr'                                  => $year,
                'bandwidth'                           => $bandwidth,
                'no_of_station'                       => $noOfStation,
                'suff_rate_id'                        => $sufRate,
            ]);

            $newAssessmentService->sufRate()->associate($sufRate)->save();
            foreach ($assessmentService->serviceFees as $fee) {
                $newAssessmentService->serviceFees()->create([
                    'code'                              => $fee->code,
                    'name_fees'                         => $fee->name_fees,
                    'amount'                            => $fee->amount,
                    'surcharge_amount'                  => $fee->surcharge_amount,
                    'total'                             => $fee->total,
                    'enabled_year_computation'          => $fee->enabled_year_computation,
                    'enabled_surcharge'                 => $fee->enabled_surcharge,
                    'enabled_portable_computation'      => $fee->enabled_portable_computation,
                    'enabled_dst_default'               => $fee->enabled_dst_default,
                    'enabled_licensed_fee_computation'  => $fee->enabled_licensed_fee_computation,
                ]);
            }
        }
        return redirect()->route('showDuplicate', $dupplicateAssessment)->with('success', 'Duplicate Assessment has been success!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function showDuplicate(Assessment $assessment)
    {    
        // return $assessment->load('applicant', 'assessmentServices.serviceFees');
        $serviceTemplates = ServiceTemplate::with('feeTemplates')->get();
        return view('applicants.show-duplicate-assessment', compact('assessment', 'serviceTemplates')); 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCopy(Assessment $assessment)
    { 
        $serviceTemplates  = ServiceTemplate::all();
        return view('applicants.show-duplicate-copy', compact('assessment', 'serviceTemplates'));
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

    public function getDetails(Applicant $applicant)
    {
        return response()->json($applicant);
    }

    public function updateApplicant(Request $request, Applicant $applicant)
    {
        $applicant->update([
            'due_date'  => $request->due_date,
            'notes'     => $request->notes
        ]);

        return $applicant;
    }

    // public function index(Assessment $assessment)
    // {
    //     $assessment->load(['applicant', 'assessmentServices.serviceFees', 'fees']);
    //      $serviceTemplates = ServiceTemplate::all();
    //      $services = Service::all();
    //     $sufRates         = SufRate::pluck('suf_name', 'id');

    //     return view('applicants.renew-assessment', compact('assessment','serviceTemplates', 'services'));
    // }
}
