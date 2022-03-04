<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A Bootstrap Blog Template">
    <meta name="author" content="SJC">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Bootstrap CSS file -->
    <link href="{{ asset('css/lib/bootstrap-3.0.3/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/lib/bootstrap-3.0.3/css/bootstrap-theme.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/blog.css') }}" rel="stylesheet" />

    @yield('summernotecss')
</head>

<body>

    <!-- Header -->
    @include('shared.header')

    <!-- Body -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('shared.footer')

    <!-- Jquery and Bootstrap Script files -->
    <script src="{{ asset('css/lib/jquery-2.0.3.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    @yield('summernotejs')
</body>

</html>
