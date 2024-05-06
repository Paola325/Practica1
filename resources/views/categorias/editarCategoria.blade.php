<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar categoria</title>
</head>
<body>
<form method="POST" action="{{ route('supervisor', ['id' => $categorias->id]) }}">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre de la categoría:</label><br>
    <input type="text" id="nombre" name="nombre" value="{{ $categorias->nombre}}" required><br><br>
    <button type="submit">Actualizar</button>
</form>
</body>
</html>