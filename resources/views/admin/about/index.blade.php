@extends('layouts.app')

@section('summernotecss')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Abouts') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">&#215;</button>
                                {{ session('success') }}
                            </div>
                        @endif
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

                        {{-- Add about info form --}}
                        <form action="{{ route('admin.abouts.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('name') }}</label>
                                <input type="text" name="name" id="name" placeholder="Enter name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="sns">{{ __('sns') }}</label>
                                <input type="text" name="sns" id="sns" placeholder="Enter sns" class="form-control"
                                    value="{{ old('sns') }}">
                            </div>
                            <div class="form-group">
                                <label for="link">{{ __('sns_link') }}</label>
                                <input type="text" name="link" id="link" placeholder="Enter sns link" class="form-control"
                                    value="{{ old('link') }}">
                            </div>
                            <div class="form-group">
                                <label for="intro">{{ __('intro') }}</label>
                                <textarea name="intro" id="summernote" rows="10" class="form-control"
                                    placeholder="Enter message...">{{ old('intro') }}</textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-md btn-primary">{{ __('submit') }}</button>
                            </div>
                        </form>

                        <hr>

                        {{-- About list info --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('name') }}</th>
                                    <th scope="col">{{ __('sns') }}</th>
                                    <th scope="col">{{ __('sns_link') }}</th>
                                    <th scope="col">{{ __('intro') }}</th>
                                    <th scope="col">{{ __('created_at') }}</th>
                                    <th scope="col">##</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td scope="row">{{ $about->name }}</td>
                                        <td>{{ $about->sns }}</td>
                                        <td>{{ $about->link }}</td>
                                        <td>{!! $about->intro !!}</td>
                                        <td>{{ $about->created_at->format('Y/m/d H:i') }}</td>
                                        <td>
                                            <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure, you want to delete?')">{{ __('delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                height: 120,
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
