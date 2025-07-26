<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INTENTARIO(login)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>
        <button class="primary" type="submit">Entrar</button>
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
<p>user@gmail.com - 1234</p>
</html>