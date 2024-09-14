<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @viteReactRefresh
    @vite('resources/js/components/MainPage.jsx')
</head>
<body>
    <div id="app"></div>
</body>
</html>