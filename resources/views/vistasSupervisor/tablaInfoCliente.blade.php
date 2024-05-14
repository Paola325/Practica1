@extends('supervisor')
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Tabla de Usuarios</h2>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de Alta</th>
            <th>Transacciones Realizadas</th>
            <th>Productos en Venta</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($usuario as $usuario)
            @if (in_array($usuario->role, ['vendedor']))
               <tr>
                  <td>{{ $usuario->nombre }}</td>
                  <td>{{ $usuario->email }}</td>
                  <td>{{ $usuario->created_at }}</td>
                  <td>1</td>
                  <td>1</td>
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
