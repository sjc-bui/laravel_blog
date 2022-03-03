@extends('layouts.main_app')

@section('title', 'About')

@section('content')
    <h1>About Me</h1>

    <div class="row">
        <div class="col-md-3 col-sm-3">
            <img class="img-thumbnail img-responsive photo" src="http://placehold.it/300x350" />
        </div>
        <div class="col-md-9 col-sm-9">
            <h3>sjc-bui</h3>
            <p>
                Hi my real name is John Rumour. I've been learning astrology for last 20 years. Yeah, that's true.
                Sometimes I used to think this is all bullshit. But still I love doing more research on this.
            </p>
        </div>
    </div>

    <p class="social-buttons text-center">
        <button type="button" class="btn btn-primary btn-lg">Visit my Facebook page</button> &nbsp;
        <button type="button" class="btn btn-default btn-lg">Visit my Github page</button>
    </p>
@endsection
