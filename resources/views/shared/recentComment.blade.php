<div class="card">
    <div class="card-header">
        <h5>{{ __('recent_comment') }}</h5>
    </div>
    <ul class="list-group list-group-flush">
        @forelse ($recentComments as $comment)
            <li class="list-group-item right-side-link">
                <a href="#">{{ Str::limit(strip_tags($comment->content), 80, $end = '...') }}</a>&nbsp;-&nbsp;<span
                    class="text-muted">{{ $comment->name }}</span>
            </li>
        @empty
            <li class="list-group-item right-side-link"><span class="text-muted">No comments yet!</span></li>
        @endforelse
    </ul>
</div>
