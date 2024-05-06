<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contraselña del usuario</title>
</head>
<body>
<form method="POST" action="{{ route('encargado', ['id' => $usuario->id]) }}">
    @csrf
    @method('PUT')
    <label for="password">Nueva contraseña:</label><br>
    <input type="text" id="password" name="password" value="{{ $usuario->password}}" required><br><br>
    <button type="submit">Actualizar</button>
</form>
</body>
</html>