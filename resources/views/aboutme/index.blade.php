@extends('layouts.main_app')

@section('title', 'About')

@section('content')
    <h1>About Me</h1>

    @if (isset($about))
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <img class="img-thumbnail img-responsive photo" src="{{ asset('images/laravel-logo.png') }}" />
            </div>
            <div class="col-md-9 col-sm-9">
                <h3>{{ $about->name }}</h3>
                <p>{{ $about->intro }}</p>
            </div>
        </div>

        <p class="social-buttons text-center">
            <a href="https://{{ $about->link }}" target="_blank" class="btn btn-default btn-md">Visit my {{ $about->sns }}</a>
        </p>
    @else
        <h5>Updating..!</h5>
    @endif
@endsection
