@extends('cliente')
@section('contenido')

<div class="productos-container">
    <style>
        .productos-container {
            column-count: 2; /* Cambia el número de columnas según sea necesario */
            column-gap: 20px; /* Espacio entre las columnas */
        }

        /* Opcional: Ajusta el estilo de los productos según sea necesario */
        .producto {
            break-inside: avoid; /* Evita que los productos se dividan entre columnas */
            margin-bottom: 20px; /* Espacio entre los productos */
        }
    </style>

    @foreach ($productos as $producto)
        @if ($producto->estado === 'Consignado')
            <div class="producto">
                <h2>{{ $producto->nombre }}</h2>
                <p>{{ $producto->descripcion }}</p>
                <p>Estado: {{ $producto->estado }}</p>
                <p>Cantidad: {{ $producto->cantidad }}</p>

                <a href="{{ route('comentarios.show', ['id_producto' => $producto->id]) }}">Ver comentarios</a>

                <a href="{{ route('compra.crear', ['id_producto' => $producto->id, 'id_usuario' =>  Auth::user()->id]) }}">Comprar</a>
            
            </div>
        @endif
    @endforeach
</div>


@endsection