<div class="card">
    <div class="card-header">
        <h5>Recent Comments</h5>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($recentComments as $comment)
            <li class="list-group-item right-side-link">
                <a href="#">{{ Str::limit(strip_tags($comment->content), 80, $end = '...') }}</a>&nbsp;-&nbsp;<span class="text-muted">{{ $comment->name }}</span>
                </li>
        @endforeach
    </ul>
</div>
