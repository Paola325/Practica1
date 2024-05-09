<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea</title>
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
            display: flex; /* Alinear elementos del nav en línea */
            justify-content: space-between; /* Espaciar elementos del nav */
            align-items: center; 
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex; /* Alinear elementos de la lista en línea */
            align-items: center; /* Centrar verticalmente los elementos de la lista */
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff; /* Cambiar el color del texto a blanco */
            text-decoration: none; /* Quitar el subrayado */
        }

        .highlighted-products {
            padding: 20px;
            background-color: #f4f4f4;
        }

        .products-container {
            display: flex;
            flex-wrap: wrap;
        }

        .product {
            width: 200px;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .categories {
            position: relative; /* Posición relativa para que la lista de categorías sea absoluta con respecto a este elemento */
            cursor: pointer; /* Cambia el cursor al pasar por encima */
        }

        .categorias-list {
            display: none; /* Oculta la lista de categorías por defecto */
            position: absolute; /* Posición absoluta para superponer la lista de categorías sobre otros elementos */
            top: calc(100% + 5px); /* Coloca la lista justo debajo del título */
            left: 0; /* Alinea la lista con el borde izquierdo del título */
            background-color: #363636; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            padding: 10px;
            z-index: 1; /* Asegura que la lista de categorías esté por encima de otros elementos */
        }

        .categories:hover .categorias-list,
        .categorias-list:hover {
            display: block; /* Muestra la lista de categorías al pasar el ratón por encima del título o la lista misma */
        }
        .titulo{
            color: #fff;
            font-size: 16px;
            margin-right: 20px; /* Añade margen para separar las categorías del botón de inicio de sesión */
        }
        nav a {
            color: #fff;
            text-decoration: none;
        }
    </style>
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
                        <li><a href="/prod/{{ $categoria->id }}">{{ $categoria->nombre }}</a></li>
                    @empty
                        <li>No hay categorías disponibles</li>
                    @endforelse
                </ul>
            </li>
        </ul>
        <ul>
        <li><a href="/login">Iniciar Sesión</a></li>
        <li><a href="/Registro">Registrarse</a></li>
        </ul>
    </nav>
    <h1>Tienda en Línea</h1>
</body>
</html>
