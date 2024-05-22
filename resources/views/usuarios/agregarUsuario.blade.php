<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 650px;
            box-sizing: border-box;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #007bff;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px; /* Ajustar el ancho máximo del formulario */
            width: 100%;
            box-sizing: border-box;
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Dos columnas */
            gap: 20px; /* Espacio entre las columnas */
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container a.button {
            width: 100%;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #6c757d;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form-container a.button:hover {
            background-color: #5a6268;
            color: #fff;
        }

        .form-container a {
            width: 100%;
            text-align: center;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .form-container a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h1>Registro de usuario</h1>
    <form method="POST" action="{{ route('vistasSupervisor.tablaClientes') }}">
        @csrf
            <label for="role">Rol:</label>
            <input type="text" id="role" name="role" value="{{ old('role') }}" required>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required >

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Agregar</button>
            <a href="/vistasSupervisor/tablaClientes" class="button">Regresar</a>
    </form>
    </div>
</body>
</html>
