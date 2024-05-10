<a href="/vistasSupervisor/tablaCategorias"><button class= "nombre">Regresar</button></a>
    <div class="productos-container">
        @foreach ($productos as $producto)
            @if ($producto->estado === 'consignado')
                <div class="producto">
                    <h2>{{ $producto->nombre }}</h2>
                    <p>{{ $producto->descripcion }}</p>
                    <p>Cantidad: {{ $producto->cantidad }}</p>
                </div>
            @endif
        @endforeach