<div class="card">
    <div class="card-header">
        <h5>{{ __('categories') }}</h5>
    </div>
    <ul class="list-group list-group-flush">
        @forelse ($categories as $category)
            <li class="list-group-item right-side-link"><a
                    href="{{ route('posts.category', $category->slug) }}">{{ $category->title }}</a>
            </li>
        @empty
            <li class="list-group-item right-side-link"><span class="text-muted">No categories yet!</span></li>
        @endforelse
    </ul>
</div>
