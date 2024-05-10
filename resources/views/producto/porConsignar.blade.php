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
                    @if ($producto->estado === 'Propuesto')
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>
                            <form id="putForm" action="{{ route('aceptar.producto', ['id' => $producto->id, 'categoriaId' => $producto->categoria_id]) }}" method="post">
                                @method('PUT')
                                @csrf
                                <!-- Agregar un campo oculto para enviar el ID del producto -->
                                <input type="hidden" name="id" value="{{ $producto->id }}">                           
                                <input type="submit" value="Consignado" onclick="return confirm('¿Estás seguro que quieres consignar este producto?');">
                            </form>
                            </td>
                            <td>
                            <a href="/producto/rechazado"><button>No consignar producto</button></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
    <br>
    <br><a href="/vistasEncargado/tablaCategorias"><button class= "button2">Regresar</button></a>
    <br><br>
    <main class="content">
    @yield("contenido")
    </main>
</body>
</html>
