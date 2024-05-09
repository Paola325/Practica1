<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal del Supervisor</title>
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
            width: 30%;
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
    

<h1>Bienvenido supervisor {{ Auth::user()->nombre }}</h1>
<section>
<h1>Tabla de Categorías</h1> 
<h1><a href='/categorias/agregarCategoria'><button>Agregar categoria</button></a></h1>
        <table class="">
                <thead>
                
                    <tr>
                        <th>Nombre</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                    <tbody>
                        @forelse ($categorias as $categorias)
                        <tr>
                            <td>{{ $categorias->nombre }}</td>
                            <td>
                            <a href= '/categorias/editarCategoria/{{ $categorias->id }}' ><button>Ver Productos</button></a>
                            </td>
                            <td>
                            <a href= '/categorias/editarCategoria/{{ $categorias->id }}' ><button>Actualizar</button></a>
                            </td>
                            <td>
                                <form id="deleteForm" action="{{ route('categorias.elimicarCategoria', $categorias->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Borrar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">
                                </form>
                                @empty
                            </tr>
                        @endforelse
                    </tbody>
            </table>
            </section>
            <section>
            <h1 >Tabla de Usuarios</h1>
            <h1><a href= '/usuarios/agregarUsuario'><button>Registrar usuario</button></a></h1>

            <table class="">
            
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
                        <td><a href='/usuarios/actualizarUsuario/{{ $usuarios->id }}'><button>Actualizar usuario</button></a></td>
                        @empty
                    <tr>
                    @endforelse
                </tbody>
            </table>
            </section>

</body>
</html>
