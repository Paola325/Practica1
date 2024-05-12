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
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
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
    </style>
</head>
<body>
    <h1>Listado de Transacciones Validas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Voucher</th>
                <th>Calificación</th>
                <th>Usuario ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transacciones as $transaccion)
                @if ($transaccion->valida == true)
                <tr>
                    <td>{{ $transaccion->id }}</td>
                    <td>
                        <a href="{{ asset($transaccion->voucher) }}" target="_blank">Descargar</a>
                    </td>
                    <td>{{ $transaccion->calificacion }}</td>
                    <td>{{ $transaccion->usuario_id }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <h3><a href="{{ route('crear_pago') }}">Crear nuevo pago</a></h3>

</body>
</html>
