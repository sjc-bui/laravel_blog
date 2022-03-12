@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Contacts') }}</div>

                    <div class="card-body">
                        <div>
                            <a href="{{ route('admin.contacts.index') }}">{{ __('back') }}</a>
                        </div>
                        <hr>
                        <div class="sub-title">{{ $contact->subject }}</div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <h3 class="iw">
                                            <span name="{{ $contact->name }}" class="contact-name">
                                                <span>{{ $contact->name }}</span>
                                            </span>
                                            <span class="contact-email">&#60;{{ $contact->email }}&#62;</span>&#32;
                                            <span>{{ $contact->created_at->format('Y/m/d H:i') }} &#40;{{ $contact->created_at->diffForHumans() }}&#41;</span>
                                        </h3>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="contact-content">
                                                {!! $contact->content !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
