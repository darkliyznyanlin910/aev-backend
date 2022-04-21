@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item w-100" height="315" src="https://www.youtube.com/embed/L2lTJtd0FsY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 pb-2">
            <div class="card">
                <div class="card-header text-light bg-danger"><b>{{ __('Post 1') }}</b></div>
                <div class="card-body">
                    Smth 1
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-2">
            <div class="card">
                <div class="card-header text-light bg-danger"><b>{{ __('Post 2') }}</b></div>
                <div class="card-body">
                    Smth 2
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif --}}
@endsection
