<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Service;
use App\AssessmentService;
use Redirect,Response;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Assessment;
use App\IdGenerator;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    

        if (request()->ajax()) {
         $applicants = Applicant::with(['assessments', 'latestAssessment'])->latest();
            return Datatables::of($applicants)
                ->addColumn('action', function ($applicant) {
                    return view('applicants.partials.actions', compact('applicant'));
                })
               // ->filter(function ($query) use ($request) {
               //  $soa_no = $request->soa_no;
               //  if (isset($soa_no) && !empty($soa_no)) {
               //      $query->where('title', 'like', '%'.$title.'%');
               //  }
                // ->editColumn('created_at', function ($applicant) {
                //        return [
                //           'display' => e($applicant->created_at->format('m/d/Y')),
               
                //        ];
                //     })

                //  ->filterColumn('soa', function ($query, $keyword) {
                //     $sql = "CONCAT(assessments.soa_prefix,'-',assessments.soa_no) like ?";
                //     $query->whereRaw($sql, ["%{$keyword}%"]);
                // })
                // ->filterColumn('latest_status', function ($query, $keyword) {
                //     $sql = 'assessments.status like ?';
                //     $query->whereRaw($sql, ["%{$keyword}%"]);
                // })

                ->make(true);

            // $assessments = Assessment::select('*', \DB::raw('MAX(soa_no) as latest_soa'))->with('applicant')->groupBy('applicant_id')->orderBy('latest_soa', 'DESC');

            // return Datatables::of($assessments)
            //     ->addColumn('latest_soa', function ($assessment) {
            //         return $assessment->soa_prefix.'-'.$assessment->latest_soa;
            //     }) 
            //     ->addColumn('action', function ($assessment) {
            //         return view('applicants.partials.actions', compact('assessment'));
            //     }) 
            //     ->make(true);

            // $applicants = \DB::table('applicants')->join('assessments', 'applicants.id', '=', 'assessments.applicant_id')
            //                 ->select(['applicants.*', 'assessments.soa_no', 'assessments.applicant_id', \DB::raw('MAX(assessments.soa_no) as latest_soa'), \DB::raw("CONCAT(assessments.soa_prefix,'-',assessments.soa_no) as soa"), 'assessments.status', \DB::raw('MAX(assessments.status) as latest_status')])
            //                 ->groupBy('applicants.id', 'assessments.applicant_id')->latest('created_at');

            // return Datatables::of($applicants)
            // ->addColumn('action', function ($applicant) {
            //     return view('applicants.partials.actions', compact('applicant'));
            // })
            // ->filterColumn('soa', function ($query, $keyword) {
            //     $sql = "CONCAT(assessments.soa_prefix,'-',assessments.soa_no) like ?";
            //     $query->whereRaw($sql, ["%{$keyword}%"]);
            // })
            // ->filterColumn('latest_status', function ($query, $keyword) {
            //     $sql = 'assessments.status like ?';
            //     $query->whereRaw($sql, ["%{$keyword}%"]);
            // })
            // ->make();
        }

        return view('applicants.index');
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

    public function createApplicant()
    {
        return view('applicants.applicant-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $soaNo = IdGenerator::generate([
            'table'  => 'assessments',
            'field'  => 'soa_no', 
            'length' => 9,
            // 'prefix' => '-'.date('y'),
            'prefix' => date('y') . '-',
            'reset_on_prefix_change' => true
        ]);
        $this->validate(request(), [
            'applicant_company' => 'required',
            // 'address'           => 'required',
            'assess_date'           => 'required',
        ]);
        $applicantId = $request->applicantId;
        $applicant   =   Applicant::create([
                        'applicant_company' => $request->applicant_company, 
                        'address' => $request->address,
                        'due_date'  => $request->due_date,
                        'notes'     => $request->notes,
                        'nature_of_documents' => $request->nature_of_documents, 
                        'assess_date'     => $request->assess_date
                    ]);
        $assessment = $applicant->assessments()->create([
            'user_id'       => auth()->user()->id,
            //'status'        => 'Advance assessment only',
            'status'        => 'Advance assessment of fees only; subject for re-assessment/screening of application as to the completeness of requirements prior to payment',
            'soa_no'        => $soaNo
        ]);
        return redirect()->route('applicants.assesment', $assessment)->with('success', 'Applicant has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Applicant $applicant)
    {
        $applicant->load(['assessments.assessmentServices']);
        return view('applicants.show', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        return response()->json($applicant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->load(['assessments.assessmentServices'])->delete();
        
        return back()->with('error', 'Success Delete!');
    }

    public function updateApplicant(Request $request)
    {
        $applicantId = $request->applicantId;
        $applicant = Applicant::findOrfail($applicantId);
        $applicant->update([
            'applicant_company' => $request->applicant_company,
            'address' => $request->address,
            'nature_of_documents' => $request->nature_of_documents, 
            'assess_date' => $request->assess_date,
        ]);
        return Response::json($applicant);
    }


    public function removeAssessment(Assessment $assessment)
    {
        $assessment->delete();
        return back()->with('error', 'Assessment has been removed!');
    }

    
    public function details()
    {
     if (request()->ajax()) {
            $assessments = Assessment::latest();
            return Datatables::of($assessments)
                ->addColumn('action', function ($assessment) {
                    return view('applicants.partials.assessment', compact('assessment'));
                })
                ->make(true);
        }
        return view('applicants.soa-or-details');
    }
}
