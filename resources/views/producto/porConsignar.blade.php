<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos propuestos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9; /* Fondo gris claro */
        }

        .productos-container {
            width: 60%;
            margin: auto;
            overflow-x: auto;
        }

        table {
            width: 90%;
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

        table td .btn_consignar, table td .boton {

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
        
        table td .btn_consignar:hover, table td .boton:hover {
            background-color: #0056b3;
        }
        .regresar{
            text-decoration: none;
            color: #20b046;
            padding: 8px 8px;
            border: none;
            border-radius: 4px;
            background-color: #20b046;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .regresar:hover, .regresar:hover {
            background-color: #197531;
        }



        .rechazar {
            text-decoration: none;
            color: #dc3545;
            padding: 8px 8px;
            border: none;
            border-radius: 4px;
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .rechazar:hover {
            background-color: #c82333;
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
                    <th style="font-weight: bold; text-align: center;">Nombre</th>
                    <th style="font-weight: bold; text-align: center;">Descripción</th>
                    <th style="font-weight: bold; text-align: center;">Estado</th>
                    <th style="font-weight: bold; text-align: center;">Cantidad</th>
                    <th style="font-weight: bold; text-align: center;" colspan="2">Acciones</th>

                </tr>
            </thead>
            <tbody> 
                <!-- Aqui estan los productos no consignados -->

                @foreach($productos as $producto)
                    @if ($producto->estado === 'Propuesto')
                        <tr>
                            <td style="text-align: center;">{{ $producto->nombre }}</td>
                            <td style="text-align: center;">{{ $producto->descripcion }}</td>
                            <td style="text-align: center;">{{ $producto->estado }}</td>
                            <td style="text-align: center;">{{ $producto->cantidad }}</td>
                            <td class="consignar">
                                <!-- Formulario para aceptar un producto -->
                                <form class="btn_consignar" id="putForm" action="{{ route('aceptar.producto', ['categoriaId' => $producto->categoria_id]) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <!-- Agregar un campo oculto para enviar el ID del producto -->
                                    <input type="hidden" name="id" value="{{ $producto->id }}">                           
                                    <input class="boton" type="submit" value="Consignado" onclick="return confirm('¿Estás seguro que quieres consignar este producto?');">
                                </form>
                            </td>
                            <td>
                                <!-- Formulario para rechazar un producto -->
                                <form id="putForm" action="{{ route('rechazar.producto', ['categoriaId' => $producto->categoria_id]) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <!-- Agregar un campo oculto para enviar el ID del producto -->
                                    <input type="hidden" name="id" value="{{ $producto->id }}">
                                    <!-- Agregar un campo de texto para el motivo -->
                                    <label for="motivo">Motivo:</label>
                                    <input type="text" name="motivo" id="motivo" required>
                                    <!-- Botón de envío del formulario -->
                                    <input class="rechazar" type="submit" value="Rechazar" onclick="return confirm('¿Estás seguro que quieres rechazar este producto?');">
                                </form>
                            </td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
<a href="/vistasEncargado/tablaCategorias"><button class= "regresar">Regresar</button></a>
</body>
</html>
