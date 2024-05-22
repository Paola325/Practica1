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
            padding: 4px;
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

        .content {
            padding: 20px;
            background-color: #fff;
        }

        .welcome-message {
            display: inline-block;
            margin-right: 10px;
        }

        li.logout {
            margin-left: auto;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>Bienvenido {{ Auth::user()->role }}, {{ Auth::user()->nombre }}</h2>
        <ul>
            <li><a href="/vistasVendedor/verProducto">Tus productos</a></li>
            <li><a href="/vistasVendedor/registroProducto">Registrar producto</a></li>
            <li><a href="/vistasVendedor/comprarProducto">Ir a comprar</a></li>
            <li><a href="/mostrar/fotos">Ver fotos</a></li>
            <li><a href="/verCompra">Ver Compras</a></li>
            <li><a href="/verVentas">Ver Ventas</a></li>
            <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
        </ul>
    </div>  
    <main class="content">
        @yield("contenido")
        </main>
</body>
</html>
