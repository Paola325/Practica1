
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
            width: 40%;
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
        .nombre{
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

        .nombre:hover, .nombre:hover {
            background-color: #197531;
        }


        table td a:hover, table td button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            
            background-color: #dc3545;
            color: white;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
<table>
    <thead>
        <tr>
            <th style="font-weight: bold; text-align: center;">Nombre</th>
            <th style="font-weight: bold; text-align: center;">Descripción</th>
            <th style="font-weight: bold; text-align: center;">Cantidad</th>
            <th style="font-weight: bold; text-align: center;">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            @if ($producto->estado === 'Consignado')
                <tr class="producto">
                    <td style="text-align: center;">{{ $producto->nombre }}</td>
                    <td style="text-align: center;">{{ $producto->descripcion }}</td>
                    <td style="text-align: center;">{{ $producto->cantidad }}</td>
                    <td style="text-align: center;"><a href="/vistasSupervisor/kardexProducto/{{ $producto->id }}"><button>Kardex</button></a></td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<a style="text-size: 10" href="/vistasSupervisor/tablaCategorias"><button class= "nombre">Regresar</button></a>


