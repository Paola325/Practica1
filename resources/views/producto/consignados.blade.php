
    <h1>Productos Consignados</h1>
    
    @if($productos->isEmpty())
        <p>No hay productos disponibles en esta categoría.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Cantidad</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody> 
                <!-- Aqui estan los productos no consignados -->

                @foreach($productos as $producto)
                    @if ($producto->estado === 'Consignado')
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->estado }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>
                                <!-- Formulario para rechazar un producto -->
                                <form id="putForm" action="{{ route('producto.consignados', ['categoriaId' => $producto->categoria_id]) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <!-- Agregar un campo oculto para enviar el ID del producto -->
                                    <input type="hidden" name="id" value="{{ $producto->id }}">
                                    <!-- Agregar un campo de texto para el motivo -->
                                    <label for="motivo"></label>
                                    <input type="text" name="motivo" id="motivo" required>
                                    <!-- Botón de envío del formulario -->
                                    <input type="submit" value="Rechazar" onclick="return confirm('¿Estás seguro que quieres des-consignar este producto?');">
                                </form>  
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
    <br>
    <br><a href="/vistasEncargado/tablaCategorias"><button class= "button2">Regresar</button></a>
</body>
</html>
