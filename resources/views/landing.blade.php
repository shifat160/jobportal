@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">
                <button class="btn btn-danger">
                    <a href="{{ route('company') }}">Post a job</a>
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <button class="btn btn-warning">
                    <a href="{{ route('seeker') }}">Seek for a job</a>
                </button>
            </div>
        </div>
    </div>
</div>


@endsection