<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Natural Peyjaz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Natural Peyjaz" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="msapplication-TileImage" content="{{ asset('front/img/favicon/mstile-144x144.png') }}">
    @include('includes.styles')
</head>

<body>
    <div id="layout-wrapper">
        @include('includes.header')
        @include('includes.sidebar')

        <div class="main-content">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>

    @include('includes.scripts')
</body>

</html>
