<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard del Vendedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            z-index: 1;
            height: 100vh;
            overflow-y: auto;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
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

        .alert {
            padding: 15px;
            background-color: #4CAF50; /* Green */
            color: white;
            margin-bottom: 15px;
        }

        .alert-danger {
            background-color: #f44336; /* Red */
        }

        .alert-success {
            background-color: #4CAF50; /* Green */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <br>
        <h2>Bienvenido {{ Auth::user()->role }}, {{ Auth::user()->nombre }}</h2>
        <ul>
            <h3><li><a href="/vistasVendedor/verProducto">Tus productos</a></li></h3>
            <h3><li><a href="/vistasVendedor/registroProducto">Registrar producto</a></li></h3>
            <h3><li><a href="comprarProducto">Ir a comprar</a></li></h3>
            <h3><li><a href="/mostrar/fotos">Ver fotos</a></li></h3>
            <h3><li><a href="/verCompra">Ver Compras</a></li></h3>
            <h3><li><a href="/verVentas">Ver Ventas</a></li></h3>
            <h2><li style="margin-top: 600px;"><a href="{{ route('logout') }}">Cerrar Sesión</a></li></h2>
        </ul>
    </div>  
    <main class="content">
        @yield("contenido")
        </main>
</body>
</html>
