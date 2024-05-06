<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Supervisor</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .table-container {
            width: 35%;

            padding: 30px;
        }

        .table-container-users {
            width: 35%;
            padding: 20px;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #000;
        }

        td {
            background-color: #fff;
        }

        button {
            padding: 5px 10px;
            background-color: #ccc;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Bienvenido supervisor</h1>
<h1>Tabla de Categorías</h1> 
<h1><button onclick="location.href = '/categorias/agregarCategoria'">Agregar categoria</button></h1>
        <table class="">
                 <thead>
                 
                        <tr>
                            <th>Nombre</th>
                            <th colspan="4">Acciones</th>
                        </tr>
                </thead>
                    <tbody>
                        @forelse ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->nombre }}</td>
                            <td>
                            <button onclick="location.href='/categorias/editarCategoria/{{ $categoria->id }}'">Actualizar</button>
                            </td>
                            <td>
                                <form id="deleteForm" action="{{ route('categorias.elimicarCategoria', $categoria->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Borrar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">
                                </form>
                            </td>
                            <td>
                                <button onclick="location.href='/productos/{{ $categoria->id }}'">Productos consignados</button>
                            </td>
                            <td>
                                <button onclick="location.href='/productos/{{ $categoria->id }}'">Productos no consignados</button>
                                @empty
                            </td>
                        @endforelse
                    </tbody>
            </table>
            <h1 >Tabla de Usuarios</h1>
            <h1><button onclick="location.href = '/usuarios/agregarUsuario'">Registrar usuario</button></h1>

            <table class="">
            
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Nombre</th>
                        <th>Apellido 1</th>
                        <th>Apellido 2</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuario as $usuario)
                    <tr>
                        <td>{{ $usuario->role }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido_paterno }}</td>
                        <td>{{ $usuario->apellido_materno }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->password }}</td>
                        @empty
                    @endforelse
                </tbody>
            </table>
</body>
</html>