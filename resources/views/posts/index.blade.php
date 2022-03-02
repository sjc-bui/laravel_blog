@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-md-8">

            {{-- Left side --}}
            @yield('home-content')

            <!-- Navigation link -->
            @include('shared.pager')

        </div>

        {{-- Right side --}}
        <div class="col-md-4">
            <!-- <div class="well text-center">
                <p class="lead">
                    Don't want to miss updates? Please click the below button!
                </p>
                <button class="btn btn-primary btn-lg">Subscribe to my feed</button>
            </div> -->

            <!-- Latest Posts -->
            @include('shared.latestPosts')

            <!-- Categories -->
            @include('shared.categories')

            <!-- Tags -->
            @include('shared.tags')

            <!-- Recent Comments -->
            @include('shared.recentComment')

        </div>
    </div>
@endsection
