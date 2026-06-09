<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Applicant;
use App\Assessment;
use Carbon\Carbon;
use App\IdGenerator;
use Yajra\DataTables\DataTables;
use App\Events\PaymentSent;
class AccountingDashboardController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $assessments = Assessment::with('applicant')->where('status', 'Review')->get();
            return Datatables::of($assessments)
                ->addColumn('action', function ($assessment) {
                    return view('accounting-dashboard.partials.action', compact('assessment'));
                })
                ->make(true);
        }
        return view('accounting-dashboard.index');
    }

    public function apiAccounting()
    {
        $assessments = Assessment::with('applicant')->where('status', 'Approved')->get();
        return $assessments;
    }

    public function show(Assessment $assessment)
    {
        $assessment->load('applicant', 'assessmentServices');
        return view('accounting-dashboard.show', compact('assessment'));
    }

    public function update(Request $request, Assessment $assessment)
    {
        $order_of_payment = IdGenerator::generate([
            'table' => 'assessments',
            'field' => 'op_no', //Order of Payment
            'length' => 13,
            'prefix' => date('Y') . '-' . date('m') . '-',  
            'reset_on_prefix_change' => true
        ]);

        $mytime = \Carbon\Carbon::now();
        $mytime->timezone('Asia/Manila');
        $mytime->format('h:i A');

        $assessment->update([
            'user_accounting_id'   => auth()->user()->id,
            'status'    => 'For Payment',
            'op_no'     => $order_of_payment, 
            'order_payment_date'    => request('order_payment_date'),
            'accounting_time_update'    => $mytime,
        ]);
        broadcast(new PaymentSent($assessment));
        \Session::flash('info', 'Your assessment has been approved!'); 
        return $assessment;
        //return redirect('/accounting/home')->with('info', 'Your assessment has been approved');
    }
}

