<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container">
        <a href="{{ route('posts') }}" class="navbar-brand">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Nav links --}}
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('posts*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('posts') }}">{{ __('home') }}<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact') }}">{{ __('contact') }}</a>
                </li>
                <li class="nav-item {{ request()->is('aboutme') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('aboutme') }}">{{ __('about') }}</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.posts.index') }}">{{ __('dashboard') }}</a>
                    </li>
                @endauth
            </ul>

            {{-- Search form --}}
            @yield('searchForm')
        </div>
    </div>
</nav>
