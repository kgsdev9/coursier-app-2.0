<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('ressources/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ressources/libs/simplebar/dist/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ressources/css/theme.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('jquery.min.js') }}"></script>
    <script src=""></script>
    <script src="{{ asset('bootstrap.min.js') }}"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('ressources/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('alpine.js') }}" defer></script>
    @stack('scripts')
</body>

</html>
