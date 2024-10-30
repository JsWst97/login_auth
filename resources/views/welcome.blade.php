<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Futurista</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <div class="container">
        <h1>Bienvenido a Laravel</h1>
        <p>Inicia sesión con una de las siguientes opciones:</p>
        <div>
            <a href="{{ url('auth/google') }}" class="btn btn-google">Iniciar sesión con Google</a>
            <a href="{{ url('auth/facebook') }}" class="btn btn-facebook">Iniciar sesión con Facebook</a>
            <a href="{{ url('auth/github') }}" class="btn btn-github">Iniciar sesión con GitHub</a>
        </div>

        <div class="login-register">
            <a href="{{ route('login') }}" class="link">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="link">Register</a>
            @endif
        </div>
    </div>
</body>
</html>
