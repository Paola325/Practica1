<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Venta</title>
</head>
<body>
    <p>Hola {{ $producto->propietario->nombre }},</p>
    <p>El cliente {{ $cliente->nombre }} ha comprado tu producto "{{ $producto->nombre }}"</p>
    <p>Cantidad: {{ $cantidad }}</p>
    <p>Total: {{ $total }}</p>
</body>
</html>
