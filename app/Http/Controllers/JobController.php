<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::all();
        return view('welcome',compact('jobs'));
    }
    

    public function show($id, Job $job) {
        //instead of find 
        
        return view('jobs.show',compact('job'));
    }

    public function create() {
        return view('jobs.create');
    }

    public function save_job(){
        $user_id = auth()->user()->id;
        // $company = Company::where('user_id',$user_id)->first();
        // $company_id =$company->id;
        // Job::create([
        //     'user_id'=>$user_id,
        //     'company_id'=>$company_id,
        //     'title'=>request('title'),
        //     'slug'=>Str::slug(request('title')),
            
        //     'roles'=>request('roles'),
        //     'description'=>request('description'),
        //     'position'=>request('position'),
        $job = new Job;
        $company = Company::where('user_id',$user_id)->first();
        $company_id =$company->id;
        $job->user_id = $user_id;
        $job->company_id = $company_id;
        $job->slug = Str::slug(request()->title);
        $job->title = request()->title;
        $job->roles = request()->roles;
        $job->description = request()->description;
        $job->position = request()->position;
        $job->save();

       // ]);
    }

    public function apply(Request $request, $id ){
        $jobId =  Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Job Applied Successfully');
    }

    public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjobs',compact('jobs'));
    }

    public function applicants(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('jobs.applicant',compact('applicants'));
    }

}
