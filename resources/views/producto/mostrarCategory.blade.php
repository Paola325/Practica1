<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
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
=======
    <title>Productos por Categoría</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
>>>>>>> 5a2cf6f83ff7c473a4ceee48d2cadbc8785fa4f5
        }
    </style>
</head>
<body>
<<<<<<< HEAD
    <div class="productos-container">
        @foreach ($productos as $producto)
            @if ($producto->estado === 'consignado')
                <div class="producto">
                    <h2>{{ $producto->nombre }}</h2>
                    <p>{{ $producto->descripcion }}</p>
                    <p>Cantidad: {{ $producto->cantidad }}</p>

                    <a href="{{ route('comentarios.show', ['id_producto' => $producto->id]) }}">Ver comentarios</a>

                    <a href="#">Comprar</a>
                </div>
            @endif
        @endforeach



    </div>    
=======
    <h1>Productos Consignados</h1>
    
    @if($productos->isEmpty())
        <p>No hay productos disponibles en esta categoría.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody> 
                <!-- Aqui estan los productos no consignados -->

                @foreach($productos as $producto)
                    @if ($producto->estado === 'consignado')
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>{{ $producto->cantidad }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
    <br>
    <br><a href="/supervisor"><button class= "button2">Regresar</button></a>
>>>>>>> 5a2cf6f83ff7c473a4ceee48d2cadbc8785fa4f5
</body>
</html>
