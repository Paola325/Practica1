<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal del Supervisor</title>
</head>
<body>
<h1>Bienvenido supervisor</h1>
    <h1>Lista de Categorías</h1>
    <table>
        <thead>
            <tr> 
                <th>Nombre</th>
                <th>Acciones</th>
                <th><button onclick="location.href = '/categorias/agregarCategoria'">Agregar</button></th></th>
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
                    <button onclick="location.href='/productos/{{ $categoria->id }}'">Productos</button>
                    @empty
                </td>
            @endforelse
        </tbody>
    </table>
</body>
</html>
