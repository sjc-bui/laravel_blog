<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container">
        <a href="{{ route('posts') }}" class="navbar-brand">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Nav links --}}
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('posts') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('posts') }}">home<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact') }}">contact</a>
                </li>
                <li class="nav-item {{ request()->is('aboutme') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('aboutme') }}">about</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">dashboard</a>
                    </li>
                @endauth
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>

            {{-- Search form --}}
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">search</button>
            </form>
        </div>
    </div>
</nav>
