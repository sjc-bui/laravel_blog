@extends('posts.index')

@section('home-content')
    <h1>Latest Posts</h1>

    @foreach ($posts as $post)
        <article>
            <h2><a href="singlepost.html">{{ $post->title }}</a></h2>

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    @if (isset($post->category))
                        <span class="glyphicon glyphicon-folder-open"></span> &nbsp;<a
                            href="#">{{ $post->category->title }}</a>
                    @endif
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-bookmark"></span> <a href="#">Aries</a>, <a
                        href="#">Fire</a>,
                    <a href="#">Mars</a>
                </div>
                <div class="col-sm-6 col-md-6">
                    <span class="glyphicon glyphicon-pencil"></span> <a
                        href="singlepost.html#comments">{{ count($post->comments) }}
                        Comments</a>
                    &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> {{ $post->created_at->format('Y/m/d H:i') }}
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
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">日本語タイトル</h4>
                    <small class="text-muted">
                        20前
                    </small>
                    <p>内容が表示されます。</p>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                    <div class="views">2022-03-04</div>
                    <div class="views">1231 12</div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">英語タイトル</h4>
                    <small class="text-muted">
                        20 minutes
                    </small>
                    <p>Some content go here</p>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                    <div class="views">2022-03-04</div>
                    <div class="views">1231 12</div>
                </div>
            </div>
        </div>
    </div>
@endsection
