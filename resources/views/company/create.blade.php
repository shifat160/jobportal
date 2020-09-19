@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @if (empty(Auth::user()->company->avatar))
                <img src="{{asset('avatar/pepsi.png') }}" alt="" width="100" style="border-radius: 50px">
            @else
            <img src="{{asset('uploads/avatar') }}/{{Auth::user()->company->avatar}}" alt="" width="100" style="border-radius: 50px">
            @endif

            {{-- <h4 class="text-primary mt-2 mb-5">{{Auth::user()->company()->name}} </h4> --}}

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            Update Profile Image
                        </div>
                        <div class="card-body">
                            <input type="file" name="logo" class="form-control"><br>
                            <button class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>

            
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Update Your Information
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    <form action="{{route('company.store')}}" method="post">
                    @csrf

                        <div class="form-group">
                            <label for="">Company First Name</label>
                            <textarea class="form-control" name="cfname" rows="3">
                                {{Auth::user()->company->cfname}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Company Last Name</label>
                            <textarea class="form-control" name="clname" rows="3">
                                {{Auth::user()->company->clname}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea class="form-control" name="address" rows="3">
                                {{Auth::user()->company->address}}
                            </textarea>
                        </div>

                        {{-- exception and validation --}}
                        @if($errors->has('address'))
                         <div class="error" style="color : red">
                            {{ $errors->first('address') }}
                        </div>   
                        @endif
                        
                        <div class="form-group">
                            <button class="btn btn-success">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    

            <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                Company Description
                            </div>
                            <div class="card-body">
                                <p>Buisiness Name:{{Auth::user()->company->cname}} </p>
                                <p>First Name:{{Auth::user()->company->cfname}} </p>
                                <p>Last Name:{{Auth::user()->company->clname}} </p>
                                <p>Email:{{Auth::user()->email}} </p>
                                <p>Address:{{Auth::user()->company->address}}</p>
                                {{-- <p class="text-success">Company Page: <a href="company/{{Auth::user()->company->slug}}">View</a> </p> --}}
                                <p>Joined Since:{{Auth::user()->created_at->diffForHumans()}}</p>


                                @if (!empty(Auth::user()->company->cover_photo))
                                    <h4>
                                    <a class="text-success" href="{{ Storage::url(Auth::user()->company->cover_photo) }}">
                                    View Your Cover Photo</a>
                                    </h4>

                                @else
                                    <p class="text-warning">
                                        Please Upload Your Cover Photo
                                    </p>
                                @endif
                            </div>
                        </div>

                    <form action="{{route('company.cover')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="card">
                            <div class="card-header">
                                Update Cover Photo
                            </div>
                            <div class="card-body">
                                <input type="file" name="cover_photo" class="form-control"><br>
                                <button class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </form>
                    @if($errors->has('resume'))
                         <div class="error" style="color : red">
                            {{ $errors->first('resume') }}
                        </div>   
                    @endif
            </div>
    </div>
    {{-- <userprofile-component></userprofile-component> --}}
</div>
@endsection
