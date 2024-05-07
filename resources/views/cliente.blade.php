<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal del Cliente</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="/producto">Productos</a></li>
            <li class="categories"> <!-- Agrega la clase "categories" para el menú desplegable -->
                <p class="titulo">Categorías</p>
                <ul class="categorias-list"> 
                    @forelse ($categorias as $categoria)
                        <li><a href="/productos/{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
                    @empty
                        <li>No hay categorías disponibles</li>
                    @endforelse
                </ul>
            </li>
        </ul>
        <ul>
        <li><a href="/">Cerrar sesion</a></li>
        </ul>
    </nav>
    <h1>Bienvenido cliente</h1>
    
</body>
</html>
