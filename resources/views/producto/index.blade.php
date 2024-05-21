@extends('welcome')
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Color de fondo gris claro */
        }

        .productos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Espacio entre los productos */
            padding: 20px; /* Margen alrededor de los productos */
        }

        .producto {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 300px; /* Ancho fijo para cada producto */
            background-color: #fff; /* Color de fondo blanco */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
            transition: transform 0.2s;
        }

        .producto:hover {
            transform: translateY(-10px); /* Efecto de elevar al pasar el cursor */
        }

        .producto h2 {
            margin-top: 0;
            font-size: 1.5em;
            color: #333;
        }

        .producto p {
            margin: 10px 0;
            color: #555;
        }

        .producto .nombre {
            display: block;
            background-color: #007bff; /* Color de fondo azul */
            color: #fff;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .producto .nombre:hover {
            background-color: #0056b3; /* Color de fondo azul oscuro al pasar el cursor */
        }

        .producto a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .producto a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="productos-container">
        @foreach ($productos as $producto)
            @if ($producto->estado === 'Consignado')
                <div class="producto">
                    <h2>{{ $producto->nombre }}</h2>
                    <p>{{ $producto->descripcion }}</p>
                    <p>Precio: $ {{ $producto->precio }}</p>
                    <p>Estado: {{ $producto->estado }}</p>
                    <p>Cantidad: {{ $producto->cantidad }}</p>
                    
                    <a href="{{ route('comentarios.show', ['id_producto' => $producto->id]) }}">Ver comentarios</a>
                </div>
            @endif
        @endforeach
    </div>    
</body>
</html>
@endsection