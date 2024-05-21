@extends('supervisor')
@section('contenido')
<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9; /* Fondo gris claro */
        }

        .productos-container {
            width: 60%;
            margin: auto;
            overflow-x: auto;
        }

        table {
            width: 40%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* Fondo blanco */
            border-radius: 8px;
            overflow: hidden;
        }

        table thead {
            background-color: #333; /* Fondo de encabezado oscuro */
            color: #fff; /* Texto blanco */
        }

        table th, table td {
            padding: 15px;
            text-align: left;
        }

        table th {
            font-weight: 600;
            font-size: 16px;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table td a, table td button {

            text-decoration: none;
            color: #007bff;
            padding: 4px 2px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }
        .agregar{
            text-decoration: none;
            color: #20b046;
            padding: 8px 8px;
            border: none;
            border-radius: 4px;
            background-color: #20b046;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .agregar:hover, .agregar:hover {
            background-color: #197531;
        }


        table td a:hover, table td button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            text-decoration: none;
            color: #dc3545;
            padding: 8px 8px;
            border: none;
            border-radius: 4px;
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>

              <h1>Tabla de Categorías</h1>
              <a href='/categorias/agregarCategoria'><button class="agregar">Agregar Categoría</button></a>
              <table>
                  <thead>
                      <tr>
                          <th style="font-weight: bold; text-align: center;">Nombre</th>
                          <th style="font-weight: bold; text-align: center;" colspan="3">Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($categorias as $categoria)
                      <tr>
                          <td style="text-align: center;">{{ $categoria->nombre }}</td>
                          <td><a href='/vistasSupervisor/tablaProductos/{{ $categoria->id }}'><button>Ver Productos</button></a></td>
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