<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Assessment;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Events\ApprovalSent;
class CheifEnginnerDashboard extends Controller
{
    public function index()
    { 
        if (request()->ajax()) {
            $assessments = Assessment::with('applicant')->where('status', 'Pending assessment')->get();
            return Datatables::of($assessments)
                ->addColumn('action', function ($assessment) {
                    return view('cheif-engineer-dashboard.partials.action', compact('assessment'));
                })
                ->make(true);
        }
        return view('cheif-engineer-dashboard.index');
    }

    public function show(Assessment $assessment)
    {
        $assessment->load('applicant', 'assessmentServices');   
        return view('cheif-engineer-dashboard.show', compact('assessment'));
    }

    public function update(Assessment $assessment)
    {

        $mytime = \Carbon\Carbon::now();
        $mytime->timezone('Asia/Manila');
        $mytime->format('h:i A');

        $assessment->update([
            'status'    => 'Review',
            'time_update'   => $mytime,
        ]);
        \Session::flash('info', 'Your assessment has been approved!'); 
        broadcast(new ApprovalSent($assessment));
        return $assessment;
    }

    public function disapproved(Assessment $assessment) 
    {
        $this->validate(request(), [
            'messages'  => 'required'
        ]);
        $assessment->update([
            'status'  => 'For Review', 
            'messages'  => request('messages'),
        ]);
        return back()->with('/chief-engineer/home')->with('warning', 'Your assessment has been declined');
    }

    public function destroy(Assessment $assessment)
    {
        $assessment->load(['applicant'])->delete();
        return back()->with('error', 'Success Delete!');
    }

    public function apiCheifEngineer()
    {
        $assessments = Assessment::with('applicant')->where('status', 'Pending assessment')->get();
        return $assessments;
    }
}
