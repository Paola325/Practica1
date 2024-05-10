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
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                @if ($producto->propietario_id && $producto->propietario_id == $vendedor_id)
                    @if ($producto->estado === 'Propuesto')
                        <tr class="producto2">
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td><a href="#">Verificar solicitud</a></td>
                        </tr>
                    @else
                        <tr class="producto">
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td><a href="{{ route('responderComentario', ['id_producto' => $producto->id]) }}">Responder comentarios</a></td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </tbody>
    </table>
</div>


@endsection