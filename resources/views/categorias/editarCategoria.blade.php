<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar categoría</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #007bff;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input[type="text"] {
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

        .form-container .link-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }

        .form-container .link-button button {
            width: auto;
            padding: 10px 20px;
            background-color: #6c757d;
        }

        .form-container .link-button button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="form-container">
    <h1>Actualizar Categoría</h1>
    <form method="POST" action="{{ route('categoria.actualizarCategoria', ['id' => $categorias->id]) }}">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $categorias->nombre}}" required><br><br>
        <button type="submit">Guardar</button>

    </form>
    <a class="link-button" href="/vistasSupervisor/tablaCategorias"><button>Regresar</button></a>
    </div>
</body>     
</html>
