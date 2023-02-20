<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('title_keyword')">
    <meta name="author" content="Waqar Mughal">



   
    <title> @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
    
    <!-- Style -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">

        @include('layouts.include.frontend.navbar')

        <main>
            @yield('content')
        </main>
    </div>
    

    <!-- scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer> </script>
    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}" defer> </script>
    @livewireScripts
</body>
</html>
