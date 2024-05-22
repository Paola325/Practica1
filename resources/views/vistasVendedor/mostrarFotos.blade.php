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
    <title>Borrar</title>
    <style>
        .table-container {
            margin-top: 20px;
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

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #ddd;
        }

        .button-container {
            margin-top: 10px;
        }

        .button-container button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .button-container button:hover {
            background-color: #45a049;
        }

        .button-container button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }

    </style>
</head>
<body>
    <div class="productos-container">
        <h2>Fotos del Producto</h2>
        @if ($fotos->count() > 0)
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto ID</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fotos as $foto)
                    <tr>
                        <td>{{ $foto->id }}</td>
                        <td>{{ $foto->producto->nombre }}</td>
                        <td><img src="{{ asset($foto->foto) }}" alt="Foto del Producto" width="200px"></td>
                        <td>
                            <form id="eliminar-foto-{{$foto->id}}" action="{{ route('eliminar.foto', ['id_foto' => $foto->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta foto?')">Eliminar Foto</button>
                            </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p>No hay fotos asociadas a este producto.</p>
        @endif
    </div>
</body>
</html>

@endsection
