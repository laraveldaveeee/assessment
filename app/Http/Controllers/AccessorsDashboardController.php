<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class AccessorsDashboardController extends Controller
{
    public function index()
    {
    	return view('accessors-dashboard.index');
    }     

}



