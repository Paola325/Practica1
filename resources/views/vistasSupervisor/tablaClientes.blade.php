@extends('supervisor')
@section('contenido')
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
                        <td><a href='/usuarios/actualizarUsuario/{{ $usuarios->id }}'><button>Actualizar Usuario</button></a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No hay usuarios registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
@endsection
