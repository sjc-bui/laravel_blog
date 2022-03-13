@extends('layouts.main_app')

@section('title', 'Contact')

@section('content')
    <h1>Contact Me</h1>

    <div class="well">
        <p class="lead">
            Do you have any question?<br>
            Please use the below contact form and send a message.<br>
            I'll reply you as quick as possible.
        </p>
    </div>

    <div class="contact-form">
        {{-- Error messages --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Opps!</strong>
                <button type="button" class="close" data-dismiss="alert">&#215;</button>
                <div>{{ __('something_wrong') }}</div>
            </div>
        @endif

        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&#215;</button>
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('store.contact') }}" method="POST" class="form-horizontal col-md-8" role="form">
            @csrf

            <div class="form-group">
                <label for="name" class="col-md-2">Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-2">Email</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label for="subject" class="col-md-2">Subject</label>
                <div class="col-md-10">
                    <input type="subject" class="form-control" id="subject" name="subject" value="{{ old('subject') }}">
                </div>
            </div>

            <div class="form-group">
                <label for="message" class="col-md-2">Message</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="contactMDE" name="message">{{ old('message') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-10 text-right">
                    <button type="submit" class="btn btn-md btn-primary my-btn">Submit</button>
                </div>
            </div>
        </form>

        @include('shared.simpleMde')

        <script>
            var bodyEditor = new SimpleMDE({
                element: document.getElementById("contactMDE")
            });
        </script>
    </div>
@endsection
