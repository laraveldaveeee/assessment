<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use Yajra\DataTables\DataTables;
class NotificationsController extends Controller
{
    public function viewNotification()
    {
		if (request()->ajax()) {
			if (auth()->user()->isAccessor() || auth()->user()->isAdmin()) {
				$assessments = Assessment::with('applicant')
										 ->where('status', 'Verified')
										 ->latest()
										 ->get();
			}

			if (auth()->user()->isChiefEngineer()) {
				$assessments = Assessment::with('applicant')
										->where('status', 'Pending')
										->latest()
										->get();
			}
			if (auth()->user()->isAccounting()) {
			$assessments = Assessment::with('applicant')
								->where('status', 'Approved')
								->latest()
								->get();

			}
			if (auth()->user()->isCashier()) {
				$assessments = Assessment::with('applicant')
										->where('status', 'For Payment')
										->latest()
										->get();
			}
            return Datatables::of($assessments)
                ->addColumn('action', function ($assessment) {
                    return view('notifications-view.actions.action', compact('assessment'));
                })
                ->make(true);
		}
		
    	return view('notifications-view.index', compact('assessments'));
    }
}
