@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Contacts') }}</div>

                    <div class="card-body">
                        <p>{{ $contact->subject }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
