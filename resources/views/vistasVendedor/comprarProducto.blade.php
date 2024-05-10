@extends('vendedor')
@section('contenido')

<div class="productos-container">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                @if ($producto->estado === 'Consignado')
                    <tr class="producto">
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>
                            <a href="{{ route('comentarios.show', ['id_producto' => $producto->id]) }}">Ver comentarios</a>
                            <a href="#">Comprar</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
    

@endsection