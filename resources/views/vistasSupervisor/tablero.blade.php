@extends('supervisor')
@section('contenido')

    <style>
        body {
            font-family: Arial, sans-serif;

        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
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

        .linea {
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .linea:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        span {
            font-weight: bold;
            color: #007bff;
        }
    </style>

    <div class="container">
        <h1>Tablero</h1>
        <p>Información relevante:</p>
        <ul>
            <li class="linea">Cantidad de usuarios registrados: <span>{{ $numUsuarios }}</span></li>
            <li class="linea">Cantidad de productos consignados: <span>{{ $numProductosConsignados }}</span></li>
            <li class="linea">Cantidad de productos no consignados: <span>{{ $numProductosNoConsignados }}</span></li>
            <li class="linea">Cantidad de compras: <span>{{ $numCompras }}</span></li>
            <li class="linea">Cantidad de transacciones: <span>{{ $numTransacciones }}</span></li>
            <li class="linea">Cantidad de pagos: <span>{{ $numPagos }}</span></li>
            <li class="linea">Cantidad de Preguntas: <span>{{ $numPreguntas }}</span></li>
            <li class="linea">Cantidad de Respuestas: <span>{{ $numRespuestas }}</span></li>
        </ul>
    </div>

@endsection
