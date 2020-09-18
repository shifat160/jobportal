<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
        $jobs = Jobs::all();
        return view('welcome',compact('jobs'));
    }

    public function show($id, Jobs $job) {
        //instead of find 
        
        return view('jobs.show',compact('job'));
    }
}
