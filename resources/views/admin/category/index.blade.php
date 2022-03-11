@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Categories') }}</div>

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

                        {{-- Add category form --}}
                        <form action="{{ route('admin.categories.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="title">{{ __('title') }}</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-md btn-primary">{{ __('submit') }}</button>
                            </div>
                        </form>

                        <hr>

                        {{-- Category list info --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('title') }}</th>
                                    <th scope="col">{{ __('created_at') }}</th>
                                    <th scope="col">##</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td scope="row">{{ $category->title }}</td>
                                        <td>{{ $category->created_at->format('Y/m/d H:i') }}</td>
                                        <td>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="post">
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
