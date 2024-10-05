<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    
    @viteReactRefresh
    @vite(['resources/js/app.jsx'])

    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/terms-of-use.css') }}">

</head>
<body>
    <div class="container">
        
        @yield('content')
    </div>
</body>
</html>
