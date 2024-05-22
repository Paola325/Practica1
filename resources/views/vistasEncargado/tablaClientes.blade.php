@extends('encargado')
@section('contenido')
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
        .agregar{
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

        .agregar:hover, .agregar:hover {
            background-color: #197531;
        }


        table td a:hover, table td button:hover {
            background-color: #0056b3;
        }

        .delete-button {
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

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
  <table class="table-container-users">
          <h2>Tabla de Usuarios</h2>
            <thead>
              <tr>
                <th style="font-weight: bold; text-align: center;">Rol</th>
                <th style="font-weight: bold; text-align: center;">Nombre</th>
                <th style="font-weight: bold; text-align: center;" colspan="2">Apellidos</th>
                <th style="font-weight: bold; text-align: center;">Correo</th>
                <th style="font-weight: bold; text-align: center;">Contraseña</th>
                <th style="font-weight: bold; text-align: center;">Acciones</th>
              </tr>
            </thead>
        <tbody>
          @forelse ($usuario as $usuario)
            @if (in_array($usuario->role, ['encargado', 'cliente', 'contador']))
              <tr>
                  <td style="text-align: center;">{{ $usuario->role }}</td>
                  <td style="text-align: center;">{{ $usuario->nombre }}</td>
                  <td style="text-align: center;">{{ $usuario->apellido_paterno }}</td>
                  <td style="text-align: center;">{{ $usuario->apellido_materno }}</td>
                  <td style="text-align: center;">{{ $usuario->email }}</td>
                  <td style="text-align: center;">{{ $usuario->password }}</td>
                  <td style="text-align: center;"><a href= '/usuarios/editarUsuario/{{ $usuario->id }}'><button>Cambiar contraseña</button></a></td>
                </tr>
            @endif
            @empty
                <tr>
                  <td colspan="7">No hay usuarios disponibles</td>
                </tr>
          @endforelse
        </tbody>
  </table>
@endsection