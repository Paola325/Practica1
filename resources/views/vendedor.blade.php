<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 2;
            background-color: #f3f4f6;
        }

        .navbar {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            z-index: 1;
            overflow: hidden;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        .navbar li {
            margin: 0;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #555;
        }

        .main-container {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        .sidebar {
            width: 150px;
            background-color: #545352;
            color: #fff;
            padding: 20px;
            overflow-y: auto;
            flex-shrink: 0;
            display: none; /* Ocultar por defecto */
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            overflow-y: auto;
        }

        .welcome-message {
            display: inline-block;
            margin-right: 10px;
        }

        li.logout {
            margin-left: auto;
        }

        .show-sidebar .sidebar {
            display: block; /* Mostrar cuando se añada la clase */
        }
    </style>
    @php
    $categorias = App\Models\Categorias::all();
@endphp
</head>
<body>
    <div class="navbar">
        <h3 class="welcome-message">Bienvenido {{ Auth::user()->role }} {{ Auth::user()->nombre }}!</h3>
        <ul>
            <li><a href="/vistasVendedor/verProducto">Tus productos</a></li>
            <li><a href="/vistasVendedor/registroProducto">Registrar producto</a></li>
            <li><a href="/vistasVendedor/comprarProducto">Ir a comprar</a></li>
            <li><a href="/vistasVendedor/mostrarFotos">Ver fotos</a></li>
            <li><a href="/verCompra">Ver Compras</a></li>
            <li><a href="/verVentas">Ver Ventas</a></li>
            <li style="font-weight: bold;" class="logout"><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
        </ul>
    </div>
    <div class="main-container {{ request()->is('vistasVendedor/comprarProducto*') ? 'show-sidebar' : '' }}">
        <div class="sidebar">
            <h3>Categorías</h3>
            <ul class="categorias-list">
                @forelse ($categorias as $categoria)
                    <li><a href="{{ route('vistasVendedor.comprarProducto.categoria', $categoria->id) }}">{{ $categoria->nombre }}</a></li>
                @empty
                    <li>No hay categorías disponibles</li>
                @endforelse
            </ul>
        </div>
        <main class="content">
            @yield('contenido')
        </main>
    </div>
</body>
</html>
