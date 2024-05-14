@extends('vendedor')
@section('contenido')

<div class="productos-container">
    <h2>Fotos del Producto</h2>
    @if ($fotos->count() > 0)
    <table>
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
                <td>{{ $foto->producto_id }}</td> 
                <td><img src="{{ asset($foto->foto) }}" alt="Foto del Producto" width="100px"></td>
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
    @else
    <p>No hay fotos asociadas a este producto.</p>
    @endif
</div>

@endsection
