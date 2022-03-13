@extends('layouts.main_app')

@section('title', 'Contact')

@section('content')
    <div class="row">
        <div class="center_div">

            <div class="contact-form">
                <div class="well">
                    <p class="lead text-muted">
                        {!! __('contact_msg') !!}
                    </p>
                </div>

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

                <form action="{{ route('store.contact') }}" method="POST" class="form-horizontal" role="form">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-md-6">{{ __('name') }}</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-6">{{ __('email') }}</label>
                        <div class="col-md-12">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="col-md-6">{{ __('subject') }}</label>
                        <div class="col-md-12">
                            <input type="subject" class="form-control" id="subject" name="subject"
                                value="{{ old('subject') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message" class="col-md-6">{{ __('message') }}</label>
                        <div class="col-md-12">
                            <textarea class="form-control" id="contactMDE" name="message">{{ old('message') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-md btn-primary my-btn">{{ __('submit') }}</button>
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
        </div>
    </div>
@endsection
