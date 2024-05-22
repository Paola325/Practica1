<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Drawer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #f3f4f6;
        }

        .navbar {
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .navbar li {
            margin: 0 10px;
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
    </style>
</head>
<body>
<div class="navbar">
<h3 class="welcome-message">Bienvenido {{ Auth::user()->role }}, {{ Auth::user()->nombre }}</h3>
        <ul>
        <li style="font-weight: bold;" class="logout"><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
        </ul>
    </div>
    <div class="main-container">
        <div class="sidebar">
            <h3>Categorias</h3>
            <ul class="categorias-list">
                @forelse ($categorias as $categoria)
                <li><a href="/vistasCliente/mostrarProductos/{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
                @empty
                    <li>No hay categorías disponibles</li>
                @endforelse
            </ul>
        </div>

        <main class="content">
            @yield("contenido")
        </main>
    </div>
</body>
</html>
