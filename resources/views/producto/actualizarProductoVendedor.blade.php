<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Actualizar Producto</h1>

    @if(session('alert'))
        <div class="alert alert-danger" role="alert">
            {{ session('alert') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('actualizar.producto', ['id_producto' => $producto->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="id_producto" value="{{ $producto->id }}">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
        </div>

        <input type="hidden" id="fecha_publicacion" name="fecha_publicacion" value="{{ $producto->fecha_publicacion }}">
        <input type="hidden" id="categoria_id" name="categoria_id" value="{{ $producto->categoria_id }}">

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required>{{ $producto->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="cantidad">Precio:</label>
            <input type="number" id="precio" name="precio" value="{{ $producto->precio }}" required>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}" required>
        </div>

        <button type="submit">Actualizar Producto</button>
    </form>
</div>

</body>
</html>
