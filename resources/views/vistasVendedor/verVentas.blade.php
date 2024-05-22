@extends('vendedor')
@section('contenido')
@php
    $categorias = App\Models\Categorias::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compras de tus productos</title>
    <style>
        .compras-table {
            width: 100%;
            border-collapse: collapse;
        }

        .compras-table th,
        .compras-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .compras-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .compras-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .compras-table tbody tr:hover {
            background-color: #ddd;
        }

    </style>
</head>
<body>
    <div class="compras-container">
        <h2>Compras de tus productos</h2>
        @if ($compras->isEmpty())
            <p>No hay compras asociadas a tus productos.</p>
        @else
            <table class="compras-table">
                <thead>
                    <tr>
                        <th>ID de Compra</th>
                        <th>Producto</th>
                        <th>Cantidad Disponible</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        @if ($compra->producto && $compra->producto->propietario_id == $vendedor_id)
                            <tr>
                                <td>{{ $compra->id }}</td>
                                <td>{{ $compra->producto->nombre }}</td>
                                <td>{{ $compra->producto->cantidad}}</td>
                            </tr>
                        @endif
                    @endforeach


                </tbody>
            </table>
        @endif
    </div>
</body>
</html>

@endsection
