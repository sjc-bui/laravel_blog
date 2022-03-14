@extends('layouts.main_app')

@section('title', __('home'))

@section('searchForm')
    @include('shared.searchForm')
@endsection

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

            <!-- Related Posts -->
            @yield('relatedPosts')

            <!-- Categories -->
            @include('shared.categories')
            <br>

            <!-- Tags -->
            {{-- @include('shared.tags')
            <br> --}}

            <!-- Recent Comments -->
            @include('shared.recentComment')
            <br>

        </div>
    </div>
@endsection
