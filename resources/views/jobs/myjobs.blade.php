@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($jobs as $job)                

            <div class="card">
                <div class="card-header">{{$job->title}}</div>


                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th> Role</th>
                            <th> Position</th>
                            <th> Description</th>
                            <th> </th>
                            <th></th>
                        </thead>
                       
                        <tbody>
                      
                            <tr>
                            <td>{{$job->roles}}</td>
                               <td>{{$job->position}}</td>
                               <td>{{$job->description}}</td>
                               <td>
                               
                               </td>
                               <td></td>
                            </tr>    
                        
                            
                        </tbody>
                      
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
