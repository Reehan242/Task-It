<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>

<body style="background-color:floralwhite;">
    <div id="app">
        @include('tasks.layouts.navigation')

        <div class="row mt-5">
            @include('tasks.layouts.sidebar')
            <div class="col-lg-8 mt-5">
                @yield('content')
            </div>
        </div>


    </div>

    @stack('scripts')
</body>

</html>
