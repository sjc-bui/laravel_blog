<div class="card">
    <div class="card-header">
        <h5>Related posts</h5>
    </div>
    <ul class="list-group list-group-flush">
        @forelse ($relatedPosts as $post)
            <li class="list-group-item right-side-link"><a
                    href="{{ route('posts.show', [$post->slug, $post->id]) }}">{{ Str::limit($post->title, 50, $end = '...') }}</a>
            </li>
        @empty
            <li class="list-group-item right-side-link"><span>No related post.</span></li>
        @endforelse
    </ul>
</div>
