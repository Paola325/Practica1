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
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f2f2f2;
        }
        .action-buttons {
            text-align: center;
        }
        .action-buttons a {
            text-decoration: none;
            padding: 6px 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .action-buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Tabla de Usuarios</h1>
<a href='/usuarios/agregarUsuario'><button>Registrar Usuario</button></a>
<table>
    <thead>
        <tr>
            <th>Rol</th>
            <th>Nombre</th>
            <th>Apellido 1</th>
            <th>Apellido 2</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($usuario as $usuarios)
        <tr>
            <td>{{ $usuarios->role }}</td>
            <td>{{ $usuarios->nombre }}</td>
            <td>{{ $usuarios->apellido_paterno }}</td>
            <td>{{ $usuarios->apellido_materno }}</td>
            <td>{{ $usuarios->email }}</td>
            <td>{{ $usuarios->password }}</td>
            <td class="action-buttons"><a href='/usuarios/actualizarUsuario/{{ $usuarios->id }}'>Actualizar Usuario</a></td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No hay usuarios registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>

@endsection
