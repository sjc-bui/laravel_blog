@extends('posts.index')

@section('home-content')
    <h1>Latest Posts</h1>

    @foreach ($posts as $post)
        <article>
            <h2><a href="singlepost.html">{{ $post->title }}</a></h2>

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <span class="glyphicon glyphicon-folder-open"></span> &nbsp;<a href="#">{{ $post->category->title }}</a>
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-bookmark"></span> <a href="#">Aries</a>, <a
                        href="#">Fire</a>,
                    <a href="#">Mars</a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <span class="glyphicon glyphicon-pencil"></span> <a href="singlepost.html#comments">{{ count($post->comments) }}
                        Comments</a>
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> {{ $post->created_at->format('M d, Y H:i:s') }}
                </div>
            </div>

            <hr>

            <!-- <img src="http://placehold.it/900x300" class="img-responsive"> -->

            <br />

            <p class="lead">Summary text here.</p>

            <p>{{ $post->content }}</p>

            <p class="text-right">
                <a href="singlepost.html">continue reading...</a>
            </p>

            <hr>
        </article>
    @endforeach
@endsection
