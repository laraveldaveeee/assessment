<?php
namespace App\Http\Controllers;
use App\Applicant;
use App\Assessment;
use App\AssessmentService;
use App\Service;
use App\User;
use App\SufRate;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\ServiceFee;
use App\ServiceTemplate;
use Carbon\Carbon;
use App\IdGenerator;
use App\Events\Approval;

class AssessmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        // check if input frac
        if (! is_numeric($str)) {
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
        // else return $str if not frac
        return $str;
    }
    public function store(Request $request, Assessment $assessment)
    {
        request()->validate([
            'services' => 'required',
        
        ]);
        $year              = $request->yr;  
        $quantity          = $request->qty;
        $convertedYear     = $this->convertFraction($year); 
        $serviceTemplate   = ServiceTemplate::with('feeTemplates')->find(request('services'));
        $assessmentService = $assessment->assessmentServices()->create([
            'name'                                => $serviceTemplate->name,
            'qty'                                 => $quantity,
            'yr'                                  => $year,
            'expiration_date'                     => request('expiration_date'),
            'bandwidth'                           => request('bandwidth'),
            'no_of_station'                       => request('no_of_station'),
            'noted'                       => request('noted'),
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
                'enabled_suf_surcharge' => true,
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
                'code'                               => $feeTemplate->code,
                'name_fees'                          => $feeTemplate->name_fees,
                'amount'                             => $amount,
                'total'                              => $total,
                'enabled_year_computation'           => $feeTemplate->enabled_year_computation,
                'enabled_surcharge'                  => $feeTemplate->enabled_surcharge,
                'enabled_portable_computation'       => $enabledPortable ? $enabledPortable : 0,
                'enabled_dst_default'                => $enabledDstDefault ? $enabledDstDefault : 0,
                'enabled_licensed_fee_computation'   => $isEnabledLicensedFee ? $isEnabledLicensedFee : 0,
            ]);
        }
      return back()->with('success', 'Assessment has been added!');
    }
    public function update(Request $reuqest)
    {
        $assessment = Assessment::findOrFail(request('assessmentId'));
    }
    //Edit AssessmentService
    public function editAssessment(AssessmentService $serviceTemplate)
    {
        $serviceId    = ServiceTemplate::where('name', $serviceTemplate->name)->pluck('id')->first();
        //$serviceSufId = SufRate::where('suf_name', $service->suf_name)->pluck('id')->first();
        return response()->json([
            'serviceId'     => $serviceId,
            'service'       => $serviceTemplate,
            //'serviceSufId'  => $serviceSufId,
        ]);
    }
    //Update Assessment Service
    public function updateAssessment(AssessmentService $assessmentService, Request $request)
    {

        

        $assessmentService->load('serviceFees');
        $assessmentService->tap(function ($collection) use ($assessmentService) {
            $assessmentService->serviceFees()->delete();
        });
        $sufRate           = request('edit_suf_rates');
        $bandwidth         = request('edit_bandwidth');
        $noOfStation       = request('edit_no_of_station');
        $year              = request('edit_for_yr');
        $quantity          = request('edit_for_qty');
        $convertedYear     = $this->convertFraction($year);
        $serviceTemplate   =  ServiceTemplate::with('feeTemplates')->find(request('edit_for_services'));
        $assessmentService = tap($assessmentService)->update([
            'name'                                => $serviceTemplate->name,
            'qty'                                 => $quantity,
            'yr'                                  => $year,
            'types'                               => request('types'),
            'bandwidth'                           => $bandwidth,
            'no_of_station'                       => $noOfStation
        ]);
        if ($sufRate) {
            $sufRate = SufRate::find($sufRate);
            $rate    = $sufRate->rates;
            $fee     = $rate * $bandwidth * $noOfStation;
            $total   = $fee * $convertedYear * $quantity;
            $assessmentService->sufRate()->associate($sufRate)->save();
            $assessmentService->serviceFees()->create([
                'name_fees'  => 'SUF',
                'amount'     => $fee,
                'total'      => $total,
                'enabled_year_computation' => true,
                'enabled_suf_surcharge' => true,
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
                $total = $dstTotal * $amount;
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
                'enabled_year_computation' => $feeTemplate->enabled_year_computation,
                'enabled_surcharge'             => $feeTemplate->enabled_surcharge,
                'enabled_portable_computation' => $enabledPortable ? $enabledPortable : 0,
                'enabled_dst_default'          => $enabledDstDefault ? $enabledDstDefault : 0,
                'enabled_licensed_fee_computation'   => $isEnabledLicensedFee ? $isEnabledLicensedFee : 0,
            ]);
        }

         $assessmentService->assessment()->update([
            'user_id'       => auth()->user()->id,
        ]);


        return response()->json($assessmentService);
    }
    //Show New Assessment
    public function show(Assessment $assessment)
    {   
        $assessment->load(['applicant', 'assessmentServices', 'assessmentServices.serviceFees', 'fees']);
        // return $assessment;
        $serviceTemplates = ServiceTemplate::all();
        $sufRates         = SufRate::pluck('suf_name', 'id');
        return view('applicants.assesment', compact('assessment', 'serviceTemplates', 'sufRates'));
    }
    //SHOW NEW GENERATE ASSESSMENT WITH SOA 
    public function showRenewAssessment(Assessment $assessment)
    {
        $assessment->load(['applicant', 'assessmentServices.serviceFees', 'fees']);
        // return $assessment;
        $serviceTemplates = ServiceTemplate::all();
        $sufRates         = SufRate::pluck('suf_name', 'id');
        return view('applicants.assesment', compact('assessment', 'serviceTemplates', 'sufRates', 'applicant'));
    }
    public function generateNewAssessment(Request $request, Applicant $applicant)
    {
        // generate assessment
        $assessment = $applicant->assessments()->create([
            'user_id' => auth()->id(),
            'status'  => 'Verified'
        ]);
        // redirect to applicants.assessments
        return redirect()->route('applicants.assesment', $assessment);
    }
    public function showAssessment(Assessment $assessment)
    {
         $assessment->load(['applicant.latestAssessment', 'assessmentServices', 'fees']);
         $services = Service::where('types', 'RENEW')->get();
         return view('applicants.show-assessment', compact('assessment', 'services'));
    }
    // Update Assessor Status with Generate SOA-NO
    public function updateStatus(Assessment $assessment)
    {
        if ($assessment->status == 'For Review' || $assessment->status == 'Pending assessment' || $assessment->status == 'For Payment' || $assessment->status == 'Paid') {
            $assessment->update([
                'user_id'       => auth()->id(),
                'status'        => 'Pending assessment',
                'date_validity' => Carbon::parse(request('date_validity')),
                'notes'         => request('notes')
            ]);
        } else {
            // $soaNo = IdGenerator::generate([
            //     'table'  => 'assessments',
            //     'field'  => 'soa_no', 
            //     'length' => 9,
            //     // 'prefix' => '-'.date('y'),
            //     'prefix' => date('y') . '-',
            //     'reset_on_prefix_change' => true
            // ]);
            $assessment->update([
                'user_id'       => auth()->id(),
                'status'        => 'Pending assessment',
                'date_validity' => request('date_validity'),
                'notes'         => request('notes'),
                // 'soa_no'        => $soaNo,
                'date_assessment'   => request('date_assessment'),
            ]);
        }

        $applicant = $assessment->applicant;

        
        broadcast(new Approval($assessment));

        \Session::flash('statuses', 'Your assessment has been sent!'); 

        //return $assessment;

        return redirect()->route('applicants.show', $applicant)->with('statuses', 'Proceed has been success!');
    }
    //DELETE ASSESSMENT
    public function deleteAssessment(AssessmentService $assessment)
    {
         $assessment->load('serviceFees','sufRate');
         $assessment->delete();
         return back()->with('error', 'Assessment has been remove!');
    }
    //Delete Fee
    public function destroyFee(ServiceFee $fee)
    {
         //$assessment->load('assessmentService.serviceFees')->delete();
         $fee->delete();
         return back()->with('error', 'ServiceFee has been removed!');
    }
    public function getServices($id)
    {
        $sufRates           = [];
        $assessmentService  = AssessmentService::findOrFail($id);
        $serviceTemplate    = ServiceTemplate::with('sufRates')->where('name', $assessmentService->name)->first();
        $sufRates = $serviceTemplate->sufRates->pluck('suf_name', 'id');
        return response()->json($sufRates);
    }
    public function getServicesAndSuf($id)
    {
        $service    = ServiceTemplate::has('sufRates')->with('sufRates')->findOrFail($id);
        $suf_rates  = [];
        if ($service->sufRates) {
            $suf_rates = $service->sufRates->pluck('suf_name', 'id');
        }
        return response()->json($suf_rates);
    }

    public function getFee(ServiceFee $fee)
    {
        return response()->json($fee);
    }    

    public function updateFee(ServiceFee $fee)
    {
         $fee->load('assessmentService');
         //$surcharge = request('surcharge') * 0.01;
        $amount    = $fee->amount;
        // $qty       = $fee->assessmentService->qty;
        // $total     = $surcharge * $qty * $amount;
        // $name      = $fee->name_fees;
        // if ($fee->enabled_suf_surcharge) {
        //     $name = "(SUF Surcharge)";
        // }
        $fee->update([
            // 'assessment_service_id' => $fee->assessment_service_id,
            'amount'                => $amount,
            // 'total'                 => $total,
        ]);
        return response()->json($fee);
    }

    public function patchFee(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        $serviceFee = ServiceFee::with('assessmentService')->findOrFail($id);
        $assessmentService = $serviceFee->assessmentService;
        $quantity = $serviceFee->assessmentService->qty ?? null;
        $year = $serviceFee->assessmentService->yr ?? null;
        $convertedYear     = $this->convertFraction($year); 
        if (!$quantity || $quantity <= 0) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid quantity from assessment service.',
        ], 422);
    }
        $serviceFee->amount = $request->amount;
        $serviceFee->total = $quantity * $convertedYear * $serviceFee->amount;
        $serviceFee->save();
        $assessment = $assessmentService->assessment;
        $grandTotal = $assessment->fees->sum('total');
        return response()->json([
             'success' => true,
            'fee_total' => $serviceFee->total,
            'updated_total' => number_format($grandTotal, 2),
        ]);
    }
}


