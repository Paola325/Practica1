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
    <h2>Bienvenido {{ Auth::user()->role }}, {{ Auth::user()->nombre }}</h2>
        <ul>
        <h3><li class="categories">
            <h3>Categorias</h3>
            <ul class="categorias-list">
                @forelse ($categorias as $categoria)
                    <li><a href="/vistasCliente/mostrarProductos/{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
                @empty
                    <li>No hay categorías disponibles</li>
                @endforelse
            </ul>
        </li></h3>
        <h3><h2><li style="margin-top: 450px;"><a href="/">Cerrar Sesión</a></li></h2>
        </ul>
    </div>
    <main class="content">
    @yield("contenido")
    </main>
</body>
</html>
