<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría</title>
</head>
<body>
    <h1>Productos por Categoría</h1>
    
    @if($productos->isEmpty())
        <p>No hay productos disponibles en esta categoría.</p>
    @else
        <ul>
            @foreach($productos as $producto)
                @if ($producto->estado === 'consignado')
                    <li>
                        <h3>{{ $producto->nombre }}</h3>
                        <p>{{ $producto->descripcion }}</p>
                        <p>Cantidad: {{ $producto->cantidad }}</p>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
</body>
</html>
