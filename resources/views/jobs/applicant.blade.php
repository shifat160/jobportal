@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($applicants as $applicant)                

            <div class="card">
                <div class="card-header">{{$applicant->title}}</div>


                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Applicant Name</th>
                            <th>Applicant Email</th>
                            <th>Applicant Address</th>
                            <th>Applicant Resume</th>
                            <th></th>
                        </thead>
                        @foreach ($applicant->users as $user)
                        <tbody>
                      
                            <tr>
                            <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td>{{$user->profile->address}}</td>
                               <td>
                               <a href="{{Storage::url($user->profile->resume)}}">Resume

                                   </a>
                               </td>
                               <td></td>
                            </tr>    
                        
                            
                        </tbody>
                        @endforeach
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
