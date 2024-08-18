<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Task List App</title>
</head>

<body>
    <div>
      <h1>@yield('title')</h1>
    </div>
    <div>
        @if (session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>

</html>
