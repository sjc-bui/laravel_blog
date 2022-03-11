{{-- Error messages --}}
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

<form action="{{ route('comments.store', $post->id) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="summernote" rows="5" class="form-control"
            placeholder="">{{ old('content') }}</textarea>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-md btn-primary">{{ __('submit') }}</button>
    </div>
</form>
