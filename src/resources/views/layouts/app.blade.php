<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Mis gastos personales')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 text-gray-900">
    <x-menu />

    <main class="container mx-auto mt-8">
        @yield('contenido')

    </main>
</body>
</html>
