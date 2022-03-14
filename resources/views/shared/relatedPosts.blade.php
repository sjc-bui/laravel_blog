<div class="card">
    <div class="card-header">
        <h5>{{ __('related_posts') }}</h5>
    </div>
    <ul class="list-group list-group-flush">
        @forelse ($relatedPosts as $post)
            <li class="list-group-item right-side-link"><a
                    href="{{ route('posts.show', [$post->slug, $post->id]) }}">{{ Str::limit($post->title, 50, $end = '...') }}</a>
            </li>
        @empty
            <li class="list-group-item right-side-link"><span class="text-muted">No related post yet!</span></li>
        @endforelse
    </ul>
</div>
