<div class="card">
    <div class="card-header">
        <h5>Categories</h5>
    </div>
    <ul class="list-group list-group-flush">
        @foreach ($categories as $category)
            <li class="list-group-item"><a href="{{ $category->slug }}">{{ $category->title }}</a></li>
        @endforeach
    </ul>
</div>
