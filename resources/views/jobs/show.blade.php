@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                <div class="card-header">{{$job->title }}</div>
                <div class="card-body">
                    <p>
                        <h3>
                           <span class="text-primary">
                            Description 
                           </span>
                            : <br>
                            {{$job->title }}

                        </h3>
                    </p>
                    <p>
                        <h3>
                            <span class="text-primary">
                                Roles 
                               </span> : <br>
                            {{$job->roles }}

                        </h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Description</div>
                <div class="card-body">
                <p>Company:<a href="{{route('company.index',[$job->company->id,$job->company->slug]) }}">
                        {{$job->company->cname }} 
                        </a>
                    </p>
                    <p>Address:{{$job->address }}</p>
                    <p>Job position:{{$job->position }}</p>

                    <p>Deadline:{{$job->last_date }}</p>
                </div>
            </div>
          
            @if (Auth::user()->user_type=='seeker')
                @if(!$job->checkjobapply())
                    @if(!empty(Auth::user()->profile->resume))
                        <jobapply-component jobid={{$job->id}}></jobapply-component>
                    @else
                        <a href="{{route('profile.create')}}">
                        <h4><span class="badge badge-danger">Please Upload Your CV to apply this position</span></h4>
                        </a>
                        
                    @endif
                @else 
                    <h4><span class="badge badge-primary">You have already applied at this position</span></h4>
                    <a href="/">
                        <button class="btn btn-success">View more jobs</button>
                    </a>
                @endif
            @endif 
        
        </div>
    </div>
</div>
@endsection
