<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        p {
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Compra</h2>
        

        <form action="{{ route('compra.guardar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto:</label>
                <p>{{ $producto->nombre }}</p>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <p>{{ $producto->precio }}</p>
            </div>

            <div class="form-group">
                <label for="cantidad_disponible">Disponibilidad:</label>
                <p>{{ $producto->cantidad }}</p>
            </div>

            <input type="hidden" id="producto_id" name="producto_id" value="{{ $producto->id }}" readonly>

            <input type="hidden" id="Usuario_id" name="Usuario_id" value="{{ $idUsuario }}">

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="Cantidad" name="Cantidad" min="1" required>
            </div>

            <button type="submit" class="btn">Compra</button>
        </form>
        
    </div>
</body>
</html>
