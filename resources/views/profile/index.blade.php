@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @if (empty(Auth::user()->profile->avatar))
                <img src="{{asset('avatar/avatar.png') }}" alt="" width="100" style="border-radius: 50px">
            @else
            <img src="{{asset('uploads/avatar') }}/{{Auth::user()->profile->avatar}}" alt="" width="100" style="border-radius: 50px">
            @endif

            <h4 class="text-primary mt-2 mb-5">{{Auth::user()->name}} </h4>

            <form action="{{route('profile.avatar')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            Update Profile Image
                        </div>
                        <div class="card-body">
                            <input type="file" name="avatar" class="form-control"><br>
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

                <form action="{{route('profile.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea class="form-control" name="address" rows="3"></textarea>
                        </div>

                        {{-- exception and validation --}}
                        @if($errors->has('address'))
                         <div class="error" style="color : red">
                            {{ $errors->first('address') }}
                        </div>   
                        @endif
                         
                        <div class="form-group">
                            <label for="">Experience</label>
                            <textarea class="form-control" name="experience" rows="3"></textarea>
                        </div>
                        @if($errors->has('experience'))
                         <div class="error" style="color : red">
                            {{ $errors->first('experience') }}
                        </div>   
                        @endif
                        <div class="form-group">
                            <label for="">Biodata</label>
                            <textarea class="form-control" name="bio" rows="3"></textarea>
                        </div>
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
                                User Description
                            </div>
                            <div class="card-body">
                                
                                <p>Email:{{Auth::user()->email}} </p>
                                <p>Address:{{Auth::user()->profile->address}}</p>
                                <p>Experience:{{Auth::user()->profile->experience}}</p>
                                <p>Bio:{{Auth::user()->profile->bio}}</p>
                                <p>Joined Since:{{Auth::user()->created_at->diffForHumans()}}</p>
                                @if (!empty(Auth::user()->profile->cover_letter))
                                    <h4>
                                    <a class="text-success" href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">
                                    Check Your Cover letter</a>
                                    </h4>

                                @else
                                    <p class="text-warning">
                                        Please Upload Your Cover Letter
                                    </p>
                                @endif


                                @if (!empty(Auth::user()->profile->resume))
                                    <h4>
                                    <a class="text-success" href="{{ Storage::url(Auth::user()->profile->resume) }}">
                                        Check Your Resume</a>
                                    </h4>

                                @else
                                    <p class="text-danger"> Your Resume is not Uploaded <br>
                                        Please Upload Your Resume
                                    </p>
                                @endif

                            </div>
                        </div>

                    <form action="{{route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="card">
                            <div class="card-header">
                                Update Cover Letter
                            </div>
                            <div class="card-body">
                                <input type="file" name="cover_letter" class="form-control"><br>
                                <button class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </form>

                    <form action="{{route('profile.resume')}}" method="post" enctype="multipart/form-data">
                            @csrf   
                        <div class="card">
                            <div class="card-header">
                                Upload Your Resume
                            </div>
                            <div class="card-body">
                                <input type="file" name="resume" class="form-control"><br>
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
