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
    </style>
</head>
<body>
    <div class="sidebar">
        <br>
        <h1>Tienda en Línea</h1>
        <ul>
        <h3><li class="categories">
            <h3>Categorias</h3>
            <ul class="categorias-list">
                @forelse ($categorias as $categoria)
                    <li><a href="/producto/index/{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
                @empty
                    <li>No hay categorías disponibles</li>
                @endforelse
            </ul>
        </li></h3>
        <br>
        <h2><li><a style="margin-top: 220px;"href="/login">Iniciar Sesión</a></li></h2>
        <h2><li><a href="/Registro">Registrarse</a></li></h2>
        </ul>
    </div>
    <main class="content">
    @yield("contenido")
    </main>
</body>
</html>
