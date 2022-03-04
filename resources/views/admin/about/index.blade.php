@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Abouts') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Opps!</strong>
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.abouts.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="sns">SNS</label>
                                <input type="text" name="sns" id="sns" placeholder="Enter sns" class="form-control"
                                    value="{{ old('sns') }}">
                            </div>
                            <div class="form-group">
                                <label for="link">SNS Link</label>
                                <input type="text" name="link" id="link" placeholder="Enter sns link" class="form-control"
                                    value="{{ old('link') }}">
                            </div>
                            <div class="form-group">
                                <label for="intro">Intro</label>
                                <textarea name="intro" id="intro" rows="5" class="form-control"
                                    placeholder="Enter message...">{{ old('intro') }}</textarea>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </div>
                        </form>

                        <hr>

                        {{-- About list info --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">sns</th>
                                    <th scope="col">link</th>
                                    <th scope="col">intro</th>
                                    <th scope="col">created at</th>
                                    <th scope="col">##</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td scope="row">{{ $about->id }}</td>
                                        <td>{{ $about->name }}</td>
                                        <td>{{ $about->sns }}</td>
                                        <td>{{ $about->link }}</td>
                                        <td>{{ $about->intro }}</td>
                                        <td>{{ $about->created_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.abouts.destroy', $about->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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