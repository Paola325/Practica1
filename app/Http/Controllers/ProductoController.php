<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;
use App\Models\Comentario;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $comentario = Comentario::all();

        return view('producto.index', compact('productos','comentario'));
    }

    
    public function productCate($categoriaId) {
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('producto.mostrarCategory', compact('productos'));
    }
    
    public function noConsignados()
    {
        $productos = Producto::all();
        return view('producto.noConsignado', compact('productos'));
    }

    public function indexCliente(Request $request) 
        {
            $productos = Producto::all();
            $categorias = Categorias::all();
    
            if ($request->expectsJson()) {
                return response()->json($productos);
            } else {
                return view('cliente', compact('productos', 'categorias'));
            }
        }
}
