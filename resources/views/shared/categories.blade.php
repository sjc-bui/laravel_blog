<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Categories</h4>
    </div>
    <ul class="list-group">
        @foreach ($categories as $category)
            <li class="list-group-item"><a href="{{ $category->slug }}">{{ $category->title }}</a></li>
        @endforeach
    </ul>
</div>
