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
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->nombre }}</td>
                <td>
                <button onclick="actualizarCategoria({{ $categoria->id }})">Actualizar</button>
                <button onclick="eliminarCategoria({{ $categoria->id }})">Eliminar</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2">No hay categorías disponibles</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <button onclick="location.href = '/categorias/agregarCategoria'">Agregar</button>

</body>
</html>
