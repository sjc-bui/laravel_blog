@extends('layouts.app')

@section('summernotecss')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit post') }}</div>

                    <div class="card-body">
                        <div>
                            <a href="{{ route('admin.home') }}">Back</a>
                        </div>
                        <hr>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Opps!</strong>
                                <button type="button" class="close" data-dismiss="alert">&#215;</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Add post form --}}
                        <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="Enter post title" class="form-control"
                                    value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug (doesn't need when the title is in English)</label>
                                <input type="text" name="slug" id="slug" placeholder="Enter post slug" class="form-control"
                                    value="{{ $post->slug }}">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category - <a href="{{ route('admin.categories') }}">Add</a></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select post category</option>
                                    @foreach ($categories as $category)
                                        <option @if (isset($post->category) && $post->category->id == $category->id)
                                            selected
                                        @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="published" id="published" @if ($post->published == 1)
                                    checked
                                @endif class="form-check-input" value="1">
                                <label class="form-check-label" for="published">Publish</label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="content">Post content</label>
                                <textarea name="content" id="summernote" rows="10" class="form-control"
                                    placeholder="Enter post content...">{{ $post->content }}</textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('summernotejs')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 220,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                ]
            });
        });
    </script>
@endsection