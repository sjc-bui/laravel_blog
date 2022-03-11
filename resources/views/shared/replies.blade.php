@foreach ($comment->replies as $reply)
    <div class="ml-4">
        <b>{{ $reply->owner->name }}</b>
        <small class="text-muted float">{{ $reply->created_at->diffForHumans() }}</small>
        <p>{{ $reply->content }}</p>
        {!! $loop->last ? '' : '<hr>' !!}
    </div>
@endforeach
