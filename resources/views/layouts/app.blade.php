<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'ميراج')</title>

    <!-- favicon -->
    <link rel="icon" type="/image/png" href="{{asset('brand/icon.png')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- Fonts Tybe -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    @yield('head')

</head>

<body id="body">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <script src="/js/main.js"></script>
    <script src="/js/code-house.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/all.min.js"></script>

    @yield('script')

</body>

</html>