<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo Electrónico</title>
</head>
<body>
    <h1>Correo electrónico</h1>
    <p>Se ha vendido uno de tus productos:</p>
    <ul>
        <li>Producto: {{ $producto->nombre }}</li>
        <li>Cantidad: {{ $cantidad }}</li>
        <li>Precio Total: ${{ $total }}</li>
    </ul>
    <p>Cliente: {{ $cliente->name }}</p>
    <p>Email del Cliente: {{ $cliente->email }}</p>
</body>
</html>
