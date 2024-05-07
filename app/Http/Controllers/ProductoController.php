<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;
use App\Models\Comentario;
use App\Models\Usuario;

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

    public function productVendedor() {
        if (Auth::check()) {
            // Obtener el ID del usuario autenticado
            $propietario_id = Auth::id();
    
            // Obtener los productos del usuario autenticado
            $usuario = Usuario::findOrFail($propietario_id);
            $productos = $usuario->productos;
    
            return view('vendedor', compact('productos'));
        } else {
            return redirect()->route('login'); 
        }
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
