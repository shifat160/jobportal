@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
        <h1>
            Recent Jobs
        </h1>
    <br>
        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @foreach ($jobs as $job)
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
                @if (Auth::user())
                    <a href="{{ route('jobs.show',[$job->id,$job->slug]) }}">
                            <button class="btn btn-sm btn-success">
                                View Job
                            </button>    
                    </a>
                @else 
                    <a href="{{ route('login') }}">
                        <button class="btn btn-sm btn-success">
                             View Job
                        </button>    
                    </a> 
                @endif
                    </td>
                </tr>    
            @endforeach
            
                
            </tbody>
        </table>
        {{$jobs->links()}}
    </div>
</div>
@endsection
