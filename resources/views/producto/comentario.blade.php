<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios del Producto</title>
    <!-- Estilos CSS -->
</head>
<body>
    <div class="container">
        <h1>Comentarios de {{ $productos->nombre }}</h1>
        @if ($comentarios->isEmpty())
            <p>No hay comentarios para este producto.</p>
        @else
            @foreach ($comentarios as $comentario)
                <div class="comentario">
                    <p>{{ $comentario->texto }}</p>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
