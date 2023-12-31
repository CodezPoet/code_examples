<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite('resources/css/style.css');
</head>

<body>
    <div id="app">
        <div class="container">
            <h1>Laravel and Headless WordPress REST API Example</h1>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
