<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Sesión</title>
</head>
<body>
    <h1>Registro de usuario</h1>
    <form method="POST" action="{{ route('supervisor') }}">
        @csrf
        <div>
            <label for="role">Rol:</label><br>
            <input type="text" id="role" name="role" value="{{ old('role') }}" required><br>
        </div>


        <div>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required ><br>
        </div>

        <div>
            <label for="apellido_paterno">Apellido Paterno:</label><br>
            <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required><br>
        </div>

        <div>
            <label for="apellido_materno">Apellido Materno:</label><br>
            <input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}" required><br>
        </div>

        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required><br>
        </div>

        <div>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br>
        </div>

        <div>
            <label for="password_confirmation">Confirmar Contraseña:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br>
        </div>

        <div>
            <br>
        <input type="submit" value="Agregar">
        </div>
    </form>
</body>
</html>
