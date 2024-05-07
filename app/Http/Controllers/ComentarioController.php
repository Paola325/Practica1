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
    
    public function guardarComentario(StoreCategoriaRequest $request)
        {
            // Crear una nueva categoriao
            $comentarios = new Comentario();
            $comentarios->fill($request->all());
            $comentarios->save();
    
            if( $request->expectsJson() ){
                return response()->json($comentarios->toArray(), 201, ["Cache-Control"=>"no-cache"]);
            }else{
                return redirect(route('producto.comentario'));
            }
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
