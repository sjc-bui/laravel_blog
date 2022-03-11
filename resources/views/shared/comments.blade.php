<div class="p-2">
    @forelse ($post->comments as $comment)
        <div class="mt-2">
            <div class="d-flex flex-row align-items-center">
                <h5 class="mr-2">{{ $comment->name }}</h5><span class="dot mb-1"></span><span
                    class="mb-1 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="content-text-sm">
                <p>{!! $comment->content !!}</p>
            </div>

            @auth
                {{-- Reply form --}}
                @include('shared.addReply')
            @endauth

            {{-- Reply list --}}
            @include('shared.replies')
        </div>
        {!! $loop->last ? '' : '<hr>' !!}
    @empty
        <p class="card-text">No comments yet!</p>
    @endforelse
</div>
