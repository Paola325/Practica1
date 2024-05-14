<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Transacciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        td button {
            padding: 8px 16px;
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        td button:hover {
            background-color: #45a049;
        }
        .transaction-details {
            margin-left: 20px;
            list-style-type: none;
            padding: 0;
        }
        .transaction-details li {
            margin-bottom: 5px;
        }
        .transaction-details h2 {
            margin-top: 10px;
            margin-bottom: 5px;
        }
        /* Estilos para las casillas de verificación */
        input[type="checkbox"] {
            transform: scale(1.5);
            margin-left: 10px;
        }
        .center {
            text-align: center;
            margin-top: 20px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Listado de Transacciones Válidas</h1>
        @csrf
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Voucher</th>
                    <th>Calificación</th>
                    <th>Vendedor</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Pago</th> 
                    
                </tr>
            </thead>
            <tbody>
                @foreach($transacciones as $transaccion)
                    @if($transaccion->valida && $transaccion->compra && $transaccion->compra->producto && $transaccion->compra->producto->propietario)
                        <tr>
                            <td>{{ $transaccion->id }}</td>
                            <td>
                                <a href="{{ asset($transaccion->voucher) }}" target="_blank">Descargar</a>
                            </td>
                            <td>{{ $transaccion->calificacion }}</td>
                            <td>{{ $transaccion->compra->producto->propietario->nombre }}</td>
                            <td>{{ $transaccion->compra->producto->nombre }}</td>
                            <td>{{ $transaccion->compra->Cantidad }}</td>
                            <td>{{ $transaccion->compra->Total }}</td>
                            
                            <td>
                                <form action="{{ route('crear_pago') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="transaccion_id" value="{{ $transaccion->id }}">
                                    <input type="text" name="pago" placeholder="Monto del pago">
                                    <button type="submit">Enviar Pago</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
</body>
</html>
