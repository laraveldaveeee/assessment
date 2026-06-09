<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class EmployeesController extends Controller
{
    public function index()
    {
        $employees = User::whereNotIn('id', [3,4,12,18,19,22])->get();
      
        return view('employees.index', compact('employees'));
    }
}
