@extends('welcome')
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Color de fondo gris claro */
        }

        .productos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Espacio entre los productos */
            padding: 20px; /* Margen alrededor de los productos */
        }

        .producto {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 300px; /* Ancho fijo para cada producto */
            background-color: #fff; /* Color de fondo blanco */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
            transition: transform 0.2s;
        }

        .producto:hover {
            transform: translateY(-10px); /* Efecto de elevar al pasar el cursor */
        }

        .producto h2 {
            margin-top: 0;
            font-size: 1.5em;
            color: #333;
        }

        .producto p {
            margin: 10px 0;
            color: #555;
        }

        .producto .nombre {
            display: block;
            background-color: #007bff; /* Color de fondo azul */
            color: #fff;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .producto .nombre:hover {
            background-color: #0056b3; /* Color de fondo azul oscuro al pasar el cursor */
        }

        .producto a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .producto a:hover {
            color: #0056b3;
        }

        .img-container {
            position: relative;
            width: 100%; /* Ajusta el ancho según sea necesario */
            height: 200px; /* Establece la altura deseada */
            border-radius: 10px;
            overflow: hidden; /* Para recortar cualquier parte de la imagen que exceda el contenedor */
            margin: 10px; /* Margen entre las imágenes */
        }

        .img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .control-prev, .control-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .control-prev {
            left: 10px;
        }

        .control-next {
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="productos-container">
        @foreach ($productos as $producto)
        @if ($producto->estado === 'Consignado')
            <div class="producto">
                @if ($producto->fotos->isNotEmpty())
                    <div class="img-container">
                        @foreach ($producto->fotos as $index => $foto)
                            <img src="{{ asset($foto->foto) }}" class="img" style="display: {{ $index == 0 ? 'block' : 'none' }};">
                        @endforeach
                        <button class="control-prev" onclick="showPrevImage(this)">&#10094;</button>
                        <button class="control-next" onclick="showNextImage(this)">&#10095;</button>
                    </div>
                @else
                    <div class="img-container">
                        <img src="{{ asset('img_producto.jpeg') }}" alt="Imagen predefinida" class="img">
                    </div>
                @endif
                <h2>{{ $producto->nombre }}</h2>
                <p>{{ $producto->descripcion }}</p>
                <p>Estado: {{ $producto->estado }}</p>
                <p>Cantidad: {{ $producto->cantidad }}</p>
            </div>
        @endif
    @endforeach
    </div>   
    <script>
        function showNextImage(button) {
            const container = button.parentElement;
            const images = container.getElementsByClassName('img');
            let currentIndex = 0;
    
            for (let i = 0; i < images.length; i++) {
                if (images[i].style.display === 'block') {
                    currentIndex = i;
                    images[i].style.display = 'none';
                    break;
                }
            }
    
            const nextIndex = (currentIndex + 1) % images.length;
            images[nextIndex].style.display = 'block';
        }
    
        function showPrevImage(button) {
            const container = button.parentElement;
            const images = container.getElementsByClassName('img');
            let currentIndex = 0;
    
            for (let i = 0; i < images.length; i++) {
                if (images[i].style.display === 'block') {
                    currentIndex = i;
                    images[i].style.display = 'none';
                    break;
                }
            }
    
            const prevIndex = (currentIndex - 1 + images.length) % images.length;
            images[prevIndex].style.display = 'block';
        }
    </script>
</body>
</html>
@endsection