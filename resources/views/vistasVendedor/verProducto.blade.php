@extends('vendedor')
@section('contenido')
@php
    $categorias = App\Models\Categorias::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9; /* Fondo gris claro */
        }

        .productos-container {
            width: 90%;
            margin: auto;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* Fondo blanco */
            border-radius: 8px;
            overflow: hidden;
        }

        table thead {
            background-color: #333; /* Fondo de encabezado oscuro */
            color: #fff; /* Texto blanco */
        }

        table th, table td {
            padding: 15px;
            text-align: left;
        }

        table th {
            font-weight: 600;
            font-size: 16px;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table td a, table td button {

            text-decoration: none;
            color: #007bff;
            padding: 4px 2px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        table td a:hover, table td button:hover {
            background-color: #0056b3;
        }

        table td button {
            background-color: #dc3545;
            color: white;
        }

        table td button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="productos-container">
        <table>
            <thead>
                <tr>
                <th style="font-weight: bold; text-align: center;">Nombre</th>
                    <th style="font-weight: bold; text-align: center;">Descripción</th>
                    <th style="font-weight: bold; text-align: center;">Estado</th>
                    <th style="font-weight: bold; text-align: center;">Cantidad</th>
                    <th style="font-weight: bold; text-align: center;" colspan="4">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    @if ($producto->propietario_id && $producto->propietario_id == $vendedor_id)
                        <tr class="producto">
                            <td style="text-align: center;">{{ $producto->nombre }}</td>
                            <td style="text-align: center;">{{ $producto->descripcion }}</td>
                            <td style="text-align: center;">{{ $producto->estado }}</td>
                            <td style="text-align: center;">{{ $producto->cantidad }}</td>
                            <td>
                                @if ($producto->estado === 'Propuesto')
                                <p>No es valido</p>
                                @else
                                    <a href="{{ route('responderComentario', ['id_producto' => $producto->id]) }}">Comentarios</a>
                                @endif
                            </td>
                            <td><a href="{{ route('actualizarProducto', ['id_producto' => $producto->id]) }}">Actualizar</a></td>
                            <td>
                            @if ($producto->estado === 'Propuesto')
                            <a href="{{ route('producto.fotos', ['id_producto' => $producto->id]) }}">Agregar Foto</a>
                                @else
                                <p>No es valido</p>
                                @endif
                            <td>
                                <form id="eliminar-producto-{{$producto->id}}" action="{{ route('eliminar.producto', ['id_producto' => $producto->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection
