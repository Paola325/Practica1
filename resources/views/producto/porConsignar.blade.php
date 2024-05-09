<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Productos por consignar</h1>
    
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
                    <th colspan="2">Acciones</th>
                    
                </tr>
            </thead>
            <tbody> 
                <!-- Aqui estan los productos no consignados -->

                @foreach($productos as $producto)
                    @if ($producto->estado === 'propuesto')
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>
                            <form id="putForm" action="{{ route('aceptar', $producto->id) }}" method="put">
                                    @method('PUT')
                                    @csrf
                                    <input type="submit" value="Consignar" onclick="return confirm('¿Estás seguro que quieres consignar este producto?')">
                                </form>
                            </td>
                            <td>
                            <button onclick="location.href='#'">No consignar producto</button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
    <br>
    <br><a href="/supervisor"><button class= "button2">Regresar</button></a>
</body>
</html>
