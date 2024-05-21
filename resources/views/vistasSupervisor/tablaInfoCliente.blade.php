@extends('supervisor')
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9; /* Fondo gris claro */
        }

        .productos-container {
            width: 80%;
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

        table td a, table td button {

            text-decoration: none;
            color: #007bff;
            padding: 4px 6px;
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

        .registrar{
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

        .registrar:hover, .registrar:hover {
            background-color: #197531;
        }
    </style>
</head>
<body>

<h2>Tabla de Vendedores</h2>

<table>
    <thead>
        <tr>
            <th style="font-weight: bold; text-align: center;">Nombre</th>
            <th style="font-weight: bold; text-align: center;">Email</th>
            <th style="font-weight: bold; text-align: center;">Fecha de Alta</th>
            <th style="font-weight: bold; text-align: center;">Transacciones Realizadas</th>
            <th style="font-weight: bold; text-align: center;">Productos en Venta</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($usuario as $usuario)
            @if (in_array($usuario->role, ['vendedor']))
               <tr>
                  <td style="text-align: center;">{{ $usuario->nombre }}</td>
                  <td style="text-align: center;">{{ $usuario->email }}</td>
                  <td style="text-align: center;">{{ $usuario->created_at }}</td>
                  <td style="text-align: center;">/</td>
                  <td style="text-align: center;">/</td>
                </tr>
             @endif
            @empty
                <tr>
                  <td colspan="7">No hay usuarios disponibles</td>
                </tr>
          @endforelse
</table>

</body>
</html>

@endsection
