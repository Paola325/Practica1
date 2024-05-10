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
            background-color: #ffffff; /* Color de fondo gris */
        }

        .productos-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Espacio entre los productos */
            margin: 20px; /* Margen alrededor de los productos */
        }

        .producto {
            border: 1px solid #929292;
            border-radius: 5px;
            padding: 10px;
            width:40%; /* Ancho de cada producto, calculado para tres productos por fila con el espacio entre ellos */
            background-color: #e6e6e6; /* Color de fondo blanco */
        }

        .producto h2 {
            margin-top: 0;
        }
        .nombre{
            background-color: #363636;
            color: #fff;
            padding: 10px;
            margin-top: 20px;
            margin-left: 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }
    </style>
</head>
<body>
<a href="/cliente"><button class= "nombre">Regresar</button></a>
    <div class="productos-container">
        @foreach ($productos as $producto)
            @if ($producto->estado === 'Consignado')
                <div class="producto">
                    <h2>{{ $producto->nombre }}</h2>
                    <p>{{ $producto->descripcion }}</p>
                    <p>Estado: {{ $producto->estado }}</p>
                    <p>Cantidad: {{ $producto->cantidad }}</p>

                    <a href="{{ route('comentarios.show', ['id_producto' => $producto->id]) }}">Ver comentarios</a>

                    <a href="#">Comprar</a>
                </div>
            @endif
        @endforeach



    </div>    
</body>
</html>
