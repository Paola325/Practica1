<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contraselña del usuario</title>
    <style>
    .button2 {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<form method="POST" action="{{ route('encargado', ['id' => $usuario->id]) }}">
    @csrf
    @method('PUT')
    <label for="role">Rol:</label><br>
    <input type="text" id="role" name="role" value="{{ $usuario->role}}" required><br><br>
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre}}" required><br><br>
    <label for="apellido_paterno">Apellido Paterno:</label><br>
    <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ $usuario->apellido_paterno}}" required><br><br>
    <label for="apellido_materno">Apellido Materno:</label><br>
    <input type="text" id="apellido_materno" name="apellido_materno" value="{{ $usuario->apellido_materno}}" required><br><br>
    <label for="email">Correo:</label><br>
    <input type="text" id="email" name="email" value="{{ $usuario->email}}" required><br><br>
    <label for="password">Nueva contraseña:</label><br>
    <input type="text" id="password" name="password" value="{{ $usuario->password}}" required><br><br>
    <button type="submit">Actualizar</button>
</form>
  <a href="/supervisor"><button class= "button2">Cancelar</button></a>
</body>
</html>