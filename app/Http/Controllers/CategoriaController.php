<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categorias::all();

        if ($request->expectsJson()) {
            return response()->json($categorias);
        } else {
            return view('welcome', compact('categorias'));
        }
    }

    public function indexCliente(Request $request)
    {
        $categorias = Categorias::all();

        if ($request->expectsJson()) {
            return response()->json($categorias);
        } else {
            return view('cliente', compact('categorias'));
        }
    }

    //CRUD del supervisor
    public function indexSupervisor(Request $request) //Ver las categorias
    {
        $usuario = Usuario::all();
        $categorias = Categorias::all();

        if ($request->expectsJson()) {
            return response()->json($usuario);
        } else {
            return view('supervisor', compact('usuario', 'categorias'));
        }
    }

        public function crearCategoria()
        {
                return view('categorias.agregarCategoria');      
        }

        public function guardarCategoria(StoreCategoriaRequest $request)
        {
            // Crear una nueva categoriao
            $categorias = new Categorias;
            $categorias->fill($request->all());
            $categorias->save();
    
            if( $request->expectsJson() ){
                return response()->json($categorias->toArray(), 201, ["Cache-Control"=>"no-cache"]);
            }else{
                return redirect(route('supervisor'));
            }
        }




        public function editCategoria(Request $request)
        {
            $id = $request->id;
            $categorias = Categorias::find($id);
            return view('categorias.editarCategoria', compact('categorias'));      
        }

        public function actualizarCategoria(UpdateCategoriaRequest $request, Categorias $categorias)
        {
            $id = $request->id;
            $categorias = Categorias::find($id);
            $categorias->fill($request->all());
            $categorias->save();
        
            if ($request->expectsJson()) {
                return response()->json($categoria->toArray(), 200, ["Cache-Control" => "no-cache"]);
            } else {
                return redirect(route('supervisor'));
            }
        }

        public function elimicarCategoria(Categorias $categorias, $id, Producto $producto)
        {
            $categoria = Categorias::find($id);
            Producto::where('categoria_id', $categoria->id)->delete();
            $categoria->delete();
            return redirect(route('supervisor'));
        }

        //Ver las categorias y productos en la vista Encargado
        public function indexEncargado(Request $request) //Ver las categorias
        {
            $usuario = Usuario::all();
            $categorias = Categorias::all();
    
            if ($request->expectsJson()) {
                return response()->json($usuario);
            } else {
                return view('encargado', compact('usuario', 'categorias'));
            }
        }


        
}
