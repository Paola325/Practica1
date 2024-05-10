@extends('encargado')
@section('contenido')

  <table class="table-container-users">
          <h1 >Tabla de Usuarios</h1>
            <thead>
              <tr>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellido 1</th>
                <th>Apellido 2</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th colspan="3">Acciones</th>
              </tr>
            </thead>
        <tbody>
          @forelse ($usuario as $usuario)
            @if (in_array($usuario->role, ['encargado', 'cliente', 'contador']))
               <tr>
                  <td>{{ $usuario->role }}</td>
                  <td>{{ $usuario->nombre }}</td>
                  <td>{{ $usuario->apellido_paterno }}</td>
                  <td>{{ $usuario->apellido_materno }}</td>
                  <td>{{ $usuario->email }}</td>
                  <td>{{ $usuario->password }}</td>
                  <td><a href= '/usuarios/editarUsuario/{{ $usuario->id }}'><button>Cambiar contraseña</button></a></td>
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