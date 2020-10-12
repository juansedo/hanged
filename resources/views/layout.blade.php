<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
</head>
<body>
    @yield('content')
    <script src="js/anime.min.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/animate.js"></script>
</body>
</html>