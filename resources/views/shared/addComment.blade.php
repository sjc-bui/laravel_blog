{{-- Error messages --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong>
        <button type="button" class="close" data-dismiss="alert">&#215;</button>
        <div>{{ __('something_wrong') }}</div>
    </div>
@endif

<form action="{{ route('comments.store', $post->id) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">{{ __('name') }}</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">{{ __('email') }}&nbsp;<span class="text-muted">{{ __('no_display') }}</span></label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="content">{{ __('content') }}</label>
        <textarea name="content" id="simpleMDE" rows="5" class="form-control">{{ old('content') }}</textarea>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-md btn-primary my-btn">{{ __('submit') }}</button>
    </div>
</form>

@include('shared.simpleMde')

<script>
    var bodyEditor = new SimpleMDE({
        element: document.getElementById("simpleMDE")
    });
</script>
