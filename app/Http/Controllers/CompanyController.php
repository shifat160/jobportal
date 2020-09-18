<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company) {
        
        return view('company.index',compact('company'));
    }

    public function companyjob() {
        $user_id = auth()->user()->id;
        $companyjob = Job::where('user_id',$user_id)->paginate(5);
        return response()->json($companyjob);
        
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'address' => 'required',
            
        ]);
        
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'cfname'=>request('cfname'),
            'clname'=>request('clname'),
            'cname'=>request('cname'),

        ]);
        return redirect()->back()->with('message','Your Profile is Updated');
    }

    public function cover(Request $request){
        $this->validate($request,[
            
            'cover' => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        $user_id = auth()->user()->id;
        $cover = $request->file('cover_photo')
        ->store('public/files');
        Company::where('user_id',$user_id)->update([
            'cover_photo'=>$cover
        ]);
        return redirect()->back()->with('message','Your Cover Image is Uploaded');
    }
    
        
    

}
