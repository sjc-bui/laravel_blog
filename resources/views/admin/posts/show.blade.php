@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Post detail') }}</div>

                    <div class="card-body">
                        <div>
                            <a href="{{ route('admin.home') }}">Back</a>
                            &#32;&#124;&#32;
                            <a href="{{ route('admin.home') }}">Edit</a>
                        </div>
                        <hr>
                        <div class="sub-title">{{ $post->title }}</div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <h3 class="iw">
                                            @if (isset($post->category))
                                                <span name="{{ $post->category->title }}" class="contact-name">
                                                    <span>{{ $post->category->title }}</span>
                                                </span>
                                            @endif
                                            <span>{{ $post->created_at->format('Y/m/d H:i') }} &#40;{{ $post->created_at->diffForHumans() }}&#41;</span>
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
                                                <p>{!! $post->content !!}</p>
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
