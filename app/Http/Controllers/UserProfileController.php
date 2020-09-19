<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;


class UserProfileController extends Controller
{

    public function __construct(){
        $this->middleware('seeker');
    }
    public function index(){

        return view('profile.index');
    }

    public function store(Request $request){

        $this->validate($request,[
            'address' => 'required',
            'experience' => 'required|min:20'
        ]);
        
        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
        ]);
        return redirect()->back()->with('message','Your Profile is Updated');
    }


    public function coverletter(Request $request){
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')
        ->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'cover_letter'=>$cover
        ]);
        return redirect()->back()->with('message','Your Cover Letter is Uploaded');
    }

    public function resume(Request $request){

        $this->validate($request,[
            
            'resume' => 'required|mimes:pdf,doc,docx|max:2000',
        ]);

        $user_id = auth()->user()->id;
        $resume = $request->file('resume')
        ->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'resume'=>$resume
        ]);
        return redirect()->back()->with('message','Your Resume is Uploaded');
    }

    public function avatar(Request $request){
        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('uploads/avatar',$fileName);
            Profile::where('user_id',$user_id)->update([
                'avatar'=>$fileName
            ]);
            return redirect()->back()->with('message','Your picture is Uploaded');
        }
    
        
    }

}
