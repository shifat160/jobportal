@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Post a new Job') }}</div>


                <div class="card-body">
                    <createjob-component></createjob-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
