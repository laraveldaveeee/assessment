<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
class LogsHistoryController extends Controller
{
    public function index()
    {
		$activities = Activity::latest()->get();
    	return view('logs-history.index', compact('activities'));
    }
}
