<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal del Vendedor</title>
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center; 
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .highlighted-products {
            padding: 20px;
            background-color: #f4f4f4;
        }

        .productos-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .producto {
            width: 200px;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .producto img {
            max-width: 100%;
            height: auto;
        }

        /* Estilos adicionales según necesidad */
        .producto h2 {
            margin-top: 0;
        }

        button {
            padding: 10px 20px;
            background-color: #333;
            margin-left: 10px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        h1{
            margin-left: 10px; 
        }

    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a></a></li>
            <li><a></a></li>
            <li><a></a></li>
        </ul>
        <ul>
            <li><a href="/">Cerrar sesión</a></li>
        </ul>
    </nav>
    <h1 style= >Bienvenido vendedor {{ Auth::user()->nombre }}</h1>
    <div class="productos-container">
    </div>
    <a href="/productos"><button>Ir a comprar</button></a>

    <button onclick="location.href='/producto/productoVendedor'">Ver tus productos</button>
</body>
</html>
