<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;
use App\Models\Comentario;
use App\Http\Requests\UpdateCategoriaRequest;

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

    public function aceptar(UpdateProductoRequest $request, Producto $productos, $categoriaId ) {
        $id = $request->id;
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        $productos->fill($request->all());
        $productos->save();
        
        return view('producto.mostrarCategory', compact('productos'));
    }


    public function porValidar($categoriaId)
    {
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('producto.porConsignar', compact('productos'));
    }

    public function rechazar(UpdateProductoRequest $request, Producto $usuario)
    {
        $id = $request->id;
        $productos = Producto::find($id);
        $productos->fill($request->all());
        $productos->save();
    
        if ($request->expectsJson()) {
            return response()->json($usuario->toArray(), 200, ["Cache-Control" => "no-cache"]);
        } else {
            return redirect(route('supervisor'));
        }
    }
    
    public function noConsignados($categoriaId)
    {
        $productos = Producto::where('categoria_id', $categoriaId)->get();
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

