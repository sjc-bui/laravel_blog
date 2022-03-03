<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ route('posts') }}" class="navbar-brand">Blog</a>
        </div>

        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

            {{-- Search form --}}
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="laravel, mysql...">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>

            {{-- Navbar link --}}
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('posts') ? 'active' : ''}}"><a href="{{ route('posts') }}">Home</a></li>
                <li class="{{ request()->is('contact') ? 'active' : ''}}"><a href="{{ route('contact') }}">Contact</a></li>
                <li class="{{ request()->is('aboutme') ? 'active' : ''}}"><a href="{{ route('aboutme') }}">About</a></li>
                @auth
                    <li class=""><a href="{{ route('home') }}">Dashboard</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>
