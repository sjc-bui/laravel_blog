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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
    <script src="{{ asset('css/lib/bootstrap-3.0.3/js/bootstrap.min.js') }}"></script>

    {{-- Summer Note --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']]
                ]
            });
        });
    </script>
</body>

</html>
