<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; 

class Home extends Controller
{
    public function index()
    {
        $total_emp = Employee::count();
        return view ('home',['total_emp'=>$total_emp]);
    }
}
