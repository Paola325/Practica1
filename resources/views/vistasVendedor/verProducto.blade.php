@extends('vendedor')
@section('contenido')

<div class="productos-container">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Cantidad</th>
                <th>Acción</th>
                <th>Acción</th>
                <th>Acción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                @if ($producto->propietario_id && $producto->propietario_id == $vendedor_id)
                    <tr class="producto">
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->estado }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>
                            @if ($producto->estado === 'Propuesto')
                                <a href="#">Verificar solicitud</a>
                            @else
                                <a href="{{ route('responderComentario', ['id_producto' => $producto->id]) }}">Responder comentarios</a>
                            @endif
                            <!-- Opción para actualizar -->
                        </td>
                        <td><a href="{{ route('actualizarProducto', ['id_producto' => $producto->id]) }}">Actualizar</a></td>
                        <td><a href="{{ route('producto.fotos', ['id_producto' => $producto->id]) }}">Agregar Foto</a></td>
                        <td>
                            <form id="eliminar-producto-{{$producto->id}}" action="{{ route('eliminar.producto', ['id_producto' => $producto->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar Producto</button>
                            </form>
                        </td>
                        
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection
