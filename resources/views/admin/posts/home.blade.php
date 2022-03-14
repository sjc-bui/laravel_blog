@extends('layouts.app')

@section('title', __('list'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-md">{{ __('create') }}</a>
                        </div>

                        {{-- Post list --}}
                        <br>
                        @if (count($posts) > 0)
                            <div class="list-group">
                                @foreach ($posts as $post)
                                    <a href="{{ route('admin.posts.show', $post->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{ $post->title }}</h5>
                                            <small class="text-muted">{{ $post->created_at->format('Y/m/d H:i') }}</small>
                                        </div>
                                        @if ($post->published == 0)
                                            <small style="color: red;">{{ __('draft') }}</small>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <small class="text-muted">No post yet!</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
