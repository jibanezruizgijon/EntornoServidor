<!DOCTYPE html>
<html lang="en">
{{-- Los @yield son unicos y los @stack se pueden repetir --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Proyecto Laravel')</title>
    @stack('css')
</head>

<body>
<header> </header>

@yield('content')

</body>

</html>
