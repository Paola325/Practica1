<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal del Encargado</title>
</head>
<body>
<<<<<<< HEAD
    <h1>Panel de Administración</h1>
    <p>Estadísticas y herramientas de gestión para el encargado.</p>
    <!-- Aquí se incluirían más elementos HTML según las funcionalidades específicas -->
=======
<h1>Bienvenido Encargado</h1>
<h1 >Tabla de Categorías</h1> 
<h1><button onclick="location.href = '/categorias/agregarCategoria'">Agregar categoria</button></h1>

        <table class="table-container">
                 <thead>
                 
                        <tr>
                            <th>Nombre</th>
                            <th colspan="3">Acciones</th>
                        </tr>
                </thead>
                    <tbody>
                        @forelse ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nombre }}</td>
                            <td>
                                <button onclick="location.href='/productos/{{ $categoria->id }}'">Productos consignados</button>
                            </td>
                            <td>
                                <button onclick="location.href='/productos/{{ $categoria->id }}'">Productos por consignar</button>
                            </td>
                            <td>
                                <button onclick="location.href='/productos/{{ $categoria->id }}'">Productos no consignados</button>
                                @empty
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
            </table>

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
                <td><button onclick="location.href='/usuarios/editarUsuario/{{ $usuario->id }}'">Cambiar contraseña</button></td>
            </tr>
        @endif
    @empty
        <tr>
            <td colspan="7">No hay usuarios disponibles</td>
        </tr>
    @endforelse
</tbody>

            </table>
>>>>>>> 8bd809dbd45d11f73cd6f6ee877b0386dc5136ae
</body>
</html>
