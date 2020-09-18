@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="company-profile">
            <img src="{{ asset('cover/pepsi_banner.jpg') }}" alt="" width="100%">
        </div>
        <br>
        <div class="company-description"><br>
            <img src="{{ asset('avatar/pepsi.png') }}" alt="" width="80">
            <h1>Company Name {{$company->cname }}</h1>
            <p>Company Descriptipn{{$company->description }}</p>
            
                <p><b>Slogan:</b>&nbsp;{{$company->slogan }}</p> 
                <p><b>Address:</b>&nbsp;{{$company->address }}</p> 
                <p><b>Phone:</b>&nbsp;{{$company->phone }}</p>
                <p><b>Website:</b>&nbsp;{{$company->website }}</p>
            
        </div>

        

        <table class="table">
            <thead>
                <th> Other Jobs of this company</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @foreach ($company->jobs as $job)
                <tr>
                    <td>
                        <img src="{{ asset('avatar/pepsi.png') }}" alt="" width="80">
                    </td>
                    <td>
                        Position: {{$job->position}}
                        <br>
                        Job Nature: <i class="fas fa-clock"></i> {{$job->type}}
                    </td>
                    <td>
                        Address: {{$job->address}}
                    </td>
                    <td>
                        {{$job->created_at->diffForHumans()}}
                    </td>
                    <td>
                    <a href="{{ route('jobs.show',[$job->id,$job->slug]) }}">
                            <button class="btn btn-sm btn-success">
                                View Job
                            </button>
                            
                        </a>
                    </td>
                </tr>    
            @endforeach
                
            </tbody>
        </table>

    </div>
</div>
@endsection
