@extends('encargado')
@section('contenido')

<table class="table-container">
<h1 >Tabla de Categorías</h1> 
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
                            <td>
                                <button onclick="location.href='/consignados/{{ $categoria->id }}'">Productos consignados</button>
                            </td>
                            <td>
                                <button onclick="location.href='/porConsignar/{{ $categoria->id }}'">Productos por consignar</button>
                            </td>
                            <td>
                                <button onclick="location.href='/noconsignados/{{ $categoria->id }}'">Productos no consignados</button>
                                @empty
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
            </table>
@endsection