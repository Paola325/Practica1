@extends('supervisor')
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tablero</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border: 2px solid #ddd;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
            color: #555;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        li:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        span {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tablero</h1>
        <p>Información relevante:</p>
        <ul>
            <li>Cantidad de usuarios registrados: <span>{{ $numUsuarios }}</span></li>
            <li>Cantidad de productos consignados: <span>{{ $numProductosConsignados }}</span></li>
            <li>Cantidad de productos no consignados: <span>{{ $numProductosNoConsignados }}</span></li>
            <li>Cantidad de compras: <span>{{ $numCompras }}</span></li>
            <li>Cantidad de transacciones: <span>{{ $numTransacciones }}</span></li>
            <li>Cantidad de pagos: <span>{{ $numPagos }}</span></li>
            <!--Agregar comentario, pregunta y respuesta--->
        </ul>
    </div>
</body>
</html>


@endsection
