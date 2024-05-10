@extends('supervisor')
@section('contenido')
              <h1>Tabla de Categorías</h1>
              <a href='/categorias/agregarCategoria'><button>Agregar Categoría</button></a>
              <table>
                  <thead>
                      <tr>
                          <th>Nombre</th>
                          <th colspan="3">Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($categorias as $categoria)
                      <tr>
                          <td>{{ $categoria->nombre }}</td>
                          <td><a href='/categorias/editarCategoria/{{ $categoria->id }}'><button>Ver Productos</button></a></td>
                          <td><a href='/categorias/editarCategoria/{{ $categoria->id }}'><button>Actualizar</button></a></td>
                          <td>
                              <form action="{{ route('categorias.elimicarCategoria', $categoria->id) }}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <button class="delete-button" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Borrar</button>
                              </form>
                          </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="4">No hay categorías disponibles.</td>
                      </tr>
                      @endforelse
                  </tbody>
              </table>
@endsection