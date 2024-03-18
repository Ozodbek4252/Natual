<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('front.includes.links')
</head>

<body>
    @include('front.navbar')

    @yield('content')

    @if (request()->route()->getName() == 'front.home')
        @include('front.home-footer')
    @else
        @include('front.footer')
    @endif

    @include('front.request-modal')

    @include('front.includes.scripts')
</body>

</html>
