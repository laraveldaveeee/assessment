<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class AdminAideDashboardController extends Controller
{
    public function index()
    {
    	return view('admin-aide-dashboard.index');
    }
}
