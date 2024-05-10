<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;
use App\Models\Comentario;
use App\Models\Usuario;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index() //Para la principal
    {
        $productos = Producto::all();
        $comentario = Comentario::all();

        return view('producto.index', compact('productos','comentario'));
    }

    public function productoVer()//Para el cliente
    {
        $productos = Producto::all();
        $comentario = Comentario::all();

        return view('vistasVendedor.comprarProducto', compact('productos','comentario'));
    }

    public function productoComprar()//Para el vendedor
    {
        $productos = Producto::all();
        $comentario = Comentario::all();

        return view('producto.productos', compact('productos','comentario'));
    }
    
    public function productCate($categoriaId) {
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('producto.mostrarCategory', compact('productos'));
    }

    public function viewProducto($categoriaId) {
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('producto.vistaProducto', compact('productos'));
    }


        
    public function porValidar($categoriaId)
    {
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('producto.porConsignar', compact('productos'));
    }

    //Consignar un producto
    public function aceptar(Request $request, Categorias $categoria, Producto $producto)
    {
        // Encuentra el producto específico por su ID
        $producto = Producto::findOrFail($request->id);
        
        // Actualiza el estado del producto a "Consignado"
        $producto->estado = 'Consignado';
        $producto->save();
        
        // Redirige a la ruta porConsignar con el parámetro categoriaId
        return redirect()->route('porConsignar', ['categoriaId' => $producto->categoria_id]);
    }

    //Desconsignar o rechazar Propuesta de un producto
    public function rechazar(UpdateProductoRequest $request, Producto $usuario)
    {
        // Encuentra el producto específico por su ID
        $producto = Producto::findOrFail($request->id);
        $producto = $request-> $motivo;
        // Actualiza el estado del producto a "Reachazado"
        $producto->estado = 'Rechazado';
        $producto-> motivo = $motivo;
        $producto->save();

        // Redirige a la ruta porConsignar con el parámetro categoriaId
        return redirect()->route('noConsignados', ['categoriaId' => $producto->categoria_id]);

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

        
        public function verProductosCategoria($categoriaId) {
            $productos = Producto::where('categoria_id', $categoriaId)->get();
            return view('vistasSupervisor.tablaProductos', compact('productos'));
        }
    


        public function verProductosVendedor(Request $request)
        {
            $vendedor_id = Auth::id();
            $productos = Producto::where('propietario_id', $vendedor_id)->get();
            $comentario = Comentario::all();
            return view('vistasVendedor.verProducto', compact('productos','comentario', 'vendedor_id'));      
        }
}

