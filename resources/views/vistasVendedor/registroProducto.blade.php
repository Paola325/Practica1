@extends('vendedor')
@section('contenido')

@php
    $categorias = App\Models\Categorias::all();
@endphp

  <form action="{{ route('vistasVendedor.registroProducto') }}" method="post">
      @csrf
      <label for="nombre">Nombre:</label><br>
      <input type="text" id="nombre" name="nombre" required><br>
      
      <label for="categoria_id">Categoria:</label><br>
        <select id="categoria_id" name="categoria_id" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select><br>
      
      <label for="fecha_publicacion">Fecha de publicación:</label><br>
      <input type="date" id="fecha_publicacion" name="fecha_publicacion" required><br>
      
      <label for="descripcion">Descripción:</label><br>
      <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br>
      
      <label for="cantidad">Cantidad:</label><br>
      <input type="number" id="cantidad" name="cantidad" required><br>
      <input type="submit" value="Guardar">
  </form>

@endsection