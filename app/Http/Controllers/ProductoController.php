<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;
use App\Models\Comentario;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        $comentario = Comentario::all();

        return view('producto.index', compact('productos','comentario'));
    }

    public function productoVer()
    {
        $productos = Producto::all();
        $comentario = Comentario::all();

        return view('producto.productos', compact('productos','comentario'));
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


        public function verProductosVendedor(Request $request)
        {
            $vendedor_id = Auth::id();
            $productos = Producto::where('propietario_id', $vendedor_id)->get();
            $comentario = Comentario::all();
            return view('producto.productoVendedor', compact('productos','comentario', 'vendedor_id'));      
        }
}

