<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Producto;

class ComentarioController extends Controller
{

    public function mostrar($id_producto)
    {
        // Aquí obtienes los comentarios asociados al producto con el ID proporcionado
        $productos = Producto::findOrFail($id_producto);
        $comentarios = $productos->comentarios;

        // Luego, devuelves una vista que muestre los comentarios
        return view('producto.comentario', compact('comentarios', 'productos'));
    }
    

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'comentario' => 'required|string|max:255',
        ]);

        // Crear y guardar el comentario en la base de datos
        Comentario::create([
            'producto_id' => $request->id_producto,
            'comentario' => $request->comentario,
        ]);

        // Redirigir de vuelta a la página de productos
        return redirect('/producto')->with('success', 'Comentario enviado correctamente.');
    }
}
