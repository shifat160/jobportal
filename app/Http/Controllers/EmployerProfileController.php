<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class EmployerProfileController extends Controller
{
    protected function store()
    {
        $user = User::create([

            'email' => request('email'),
            'user_type' => request('user_type'),
            'password' => Hash::make(request('password')),
        ]);
        Company::create([
            'user_id' =>$user->id,
            'cname' => request('cname'),
            'cfname' => request('cfname'),
            'clname' => request('clname'),
            'slug' => Str::slug(request('cname')),

            
        ]);
        return redirect()->to('login');
    }
}
