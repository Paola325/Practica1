<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form div {
            margin-bottom: 15px;
            text-align: left;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input::placeholder {
            color: #999;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .link {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        .link:hover {
            text-decoration: underline;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Sesión</h1>
        <form method="POST" action="{{ route('Registro') }}">
            @csrf
            <div>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
            </div>

            <div>
                <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno" value="{{ old('apellido_paterno') }}" required>
            </div>

            <div>
                <input type="text" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno" value="{{ old('apellido_materno') }}" required>
            </div>

            <div>
                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>

            <div>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
            </div>

            <div>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            </div>

            <div>
                <button type="submit" class="button">Registrar</button>
            </div>
        </form>
        <div class="form-footer">
            <a href="/login" class="link">¿Ya tienes una cuenta? Iniciar Sesión</a>
        </div>
    </div>
</body>
</html>
