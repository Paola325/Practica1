
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
                    <td><a href="/vistasSupervisor/kardexProducto/{{ $producto->id }}"><button class= "nombre">Kardex</button></a></td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<br><br>
<a href="/vistasSupervisor/tablaCategorias"><button class= "nombre">Regresar</button></a>


