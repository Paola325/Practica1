<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Producto;
use App\Http\Requests\StoreCategoriaRequest;

class ComentarioController extends Controller
{

    public function mostrar($id_producto)
    {
        $comentarios = Comentario::where('producto_id', $id_producto)->get();
        $productos = Producto::find($id_producto);

        return view('producto.comentario', compact('comentarios', 'productos'));
    }

    public function verComentarios($id_producto)
    {
        $comentarios = Comentario::where('producto_id', $id_producto)->get();
        $productos = Producto::find($id_producto);

        return view('producto.responderComentario', compact('comentarios', 'productos'));
    }

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_producto' => 'required|integer',
            'texto' => 'required|string',
            'tipo' => 'required|string',
        ]);

        // Crear un nuevo comentario
        $comentario = new Comentario();
        $comentario->producto_id = $request->id_producto;
        $comentario->texto = $request->texto;
        $comentario->tipo = $request->tipo;
        $comentario->save();

        return back();
    }

}
