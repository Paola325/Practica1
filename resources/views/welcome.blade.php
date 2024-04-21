<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Línea</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
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
            padding: 20px;
            background-color: #eee;
        }

        .category {
            display: inline-block;
            margin-right: 10px;
            padding: 5px 10px;
            background-color: #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="/login">Iniciar Sesion </a></li>
        </ul>
    </nav>

    <section class="highlighted-products">
        <h2>Productos Destacados</h2>
        <div class="products-container">
            <div class="product">
                <img src="product1.jpg" alt="Product 1">
                <h3>Producto 1</h3>
                <p>Precio: $20</p>
            </div>
            <div class="product">
                <img src="product2.jpg" alt="Product 2">
                <h3>Producto 2</h3>
                <p>Precio: $30</p>
            </div>
            <div class="product">
                <img src="product3.jpg" alt="Product 3">
                <h3>Producto 3</h3>
                <p>Precio: $25</p>
            </div>
        </div>
    </section>

    <section class="categories">
        <h2>Categorías</h2>
        <div class="category">Electrónicos</div>
        <div class="category">Ropa</div>
        <div class="category">Hogar y Jardín</div>
    </section>

</body>
</html>
