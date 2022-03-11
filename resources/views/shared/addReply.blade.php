<form action="{{ route('replies.store', $comment->id) }}" method="post" class="ml-4 mb-2">
    @csrf
    <div class="input-group">
        <input type="text" name="content" autocomplete="off" id="content" required class="form-control"
            placeholder="Write your reply...">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Reply</button>
        </div>
    </div>
</form>
