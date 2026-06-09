<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessRocController extends Controller
{
    public function index()
    {
    	return view('processings.roc.index');
    }
}
