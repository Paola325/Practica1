<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Categoría</title>
</head>
<body>
    <h1>Agregar Nueva Categoría</h1>
    <form method="POST" action="{{ route('categorias.agregarCategoria') }}">
        @csrf
        <label for="nombre">Nombre de la categoría:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>
