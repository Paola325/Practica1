<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
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
}
