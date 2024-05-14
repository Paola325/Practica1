<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Producto</title>
    <!-- Estilos CSS -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Información del Producto</h2>

<table>
  <tr>
    <th>Producto</th>
    <th>Fecha de publicación</th>
    <th>Interes en el producto</th>
    <th>Compras realizadas</th>
  </tr>
  <tr>
    <td>{{ $producto->nombre }}</td>
    <td>{{ $producto->fecha_publicacion }}</td>
    <td>{{ $cantidadComentarios }}</td>
    <td>Sí</td>
  </tr>
</table>
<br>
<a href="{{ url()->previous() }}"><button class="nombre">Regresar</button></a>
</body>
</html>