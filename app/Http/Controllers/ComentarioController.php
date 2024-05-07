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
