<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="{{ route('posts') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item {{ request()->is('admin/home*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.home') }}">posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">comments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">categories</a>
                            </li>
                            <li class="nav-item {{ request()->is('admin/contacts*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.contacts') }}">contacts</a>
                            </li>
                            <li class="nav-item {{ request()->is('admin/abouts*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.abouts') }}">abouts</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link"> | </span>
                            </li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                                        href="{{ route('login') }}">{{ __('login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                                        href="{{ route('register') }}">{{ __('register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- Username --}}
                            <li class="nav-item">
                                <span class="nav-link" style="color: black;">{{ Auth::user()->name }}</span>
                            </li>
                            {{-- Logout button --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Jquery and Bootstrap Script files -->
    <script src="{{ asset('css/lib/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('css/lib/bootstrap-3.0.3/js/bootstrap.min.js') }}"></script>
</body>

</html>
