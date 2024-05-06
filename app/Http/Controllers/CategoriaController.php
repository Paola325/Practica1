<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriaRequest;

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
    //CRUD del supervisor
    public function indexSupervisor(Request $request)
    {
        $categorias = Categorias::all();

        if ($request->expectsJson()) {
            return response()->json($categorias);
        } else {
            return view('supervisor', compact('categorias'));
        }
    }

        public function crearCategoria(StoreCategoriaRequest $categorias)
        {
                return view('categorias.agregarCategoria');      
        }

    
}
