@foreach ($comment->replies as $reply)
    <div class="ml-4">
        <b><span>{{ $reply->owner->name }}</span></b>
        <span class="thread-admin">{{ __('admin') }}</span>
        <span class="text-muted float">{{ $reply->created_at->diffForHumans() }}</span>
        <p>{{ $reply->content }}</p>
        {!! $loop->last ? '' : '<hr>' !!}
    </div>
@endforeach
