@extends('vendedor')
@section('contenido')

@php
    $categorias = App\Models\Categorias::all();
@endphp

<style>
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;

    }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        margin-top: 8px;
    }

    form input[type="text"],
    form input[type="date"],
    form input[type="number"],
    form textarea,
    form select {
        width: calc(100% - 20px);
        padding: 10px;
        margin-top: 2px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    form input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 10px;
        transition: background-color 0.3s ease;
        margin-top: 10px;
    }

    form input[type="submit"]:hover {
        background-color: #555;
    }
</style>
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

      <label for="precio">Precio:</label><br>
    <input type="number" id="precio" name="precio" min="0" step="0.01" required><br>
      
      <label for="cantidad">Cantidad:</label><br>
      <input type="number" id="cantidad" name="cantidad" required><br>
      <input type="submit" value="Guardar">
  </form>

@endsection