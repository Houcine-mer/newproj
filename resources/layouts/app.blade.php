<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AutoDZ')</title>
    <link rel="icon" href="{{ asset('images/simple-car-silhouette-sticker-u33a0-x450 5.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="{{ asset('css/usrlay.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headerStyle.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @yield('content')

    <script src="{{ asset('js/auth.js') }}"></script>
    <script src="{{ asset('js/headerScript.js') }}"></script>
    <script src="{{ asset('js/load-all.js') }}"></script>
    <script src="{{ asset('js/usrly.js') }}"></script>
</body>
</html>

