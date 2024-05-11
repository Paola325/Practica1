<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Producto;
use App\Models\Usuario;
use App\Http\Requests\StoreCategoriaRequest;

class ComentarioController extends Controller
{

    public function mostrar($id_producto)
    {
        $comentarios = Comentario::where('producto_id', $id_producto)->get();
        $productos = Producto::find($id_producto);
        $usuarios = Usuario::whereIn('id', $comentarios->pluck('comprador_id'))->get();
        $nombres_compradores = Usuario::whereIn('id', $comentarios->pluck('comprador_id'))->pluck('nombre', 'id');
        

        return view('producto.comentario', compact('comentarios', 'productos', 'nombres_compradores'));
    }
   // $comentarios = Comentario::where('producto_id', $id_producto)->get();
    //$productos = Producto::find($id_producto);
    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_producto' => 'required|integer',
            'comprador_id' => 'required|integer',
            'texto' => 'required|string',
            'tipo' => 'required|string',
        ]);

        // Crear un nuevo comentario
        $comentario = new Comentario();
        $comentario->producto_id = $request->id_producto;
        $comentario->comprador_id = $request->comprador_id;
        $comentario->texto = $request->texto;
        $comentario->tipo = $request->tipo;
        $comentario->save();

        return back();
    }

    public function verComentarios($id_producto)
    {
        $comentarios = Comentario::where('producto_id', $id_producto)->get();
        $productos = Producto::find($id_producto);
        $usuarios = Usuario::whereIn('id', $comentarios->pluck('comprador_id'))->get();

        // Obtener el nombre
        $nombres_compradores = Usuario::whereIn('id', $comentarios->pluck('comprador_id'))->pluck('nombre', 'id');

        return view('producto.responderComentario', compact('comentarios', 'productos', 'nombres_compradores'));
    }


}
