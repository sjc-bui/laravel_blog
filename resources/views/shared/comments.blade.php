<div class="p-2">
    @forelse ($post->comments as $comment)
        <div class="mt-2">
            <div class="d-flex flex-row align-items-center">
                <b><span>{{ $comment->name }}</span></b>&nbsp;
                <span class="text-muted float">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="content-text-sm">
                {!! $comment->content !!}
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
        <p class="text-muted">{{ __('no_comments') }}</p>
    @endforelse
</div>
