<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;
use App\Models\Comentario;
use App\Models\Usuario;
use App\Http\Requests\UpdateProductoRequest;
use App\Http\Requests\StoreProductoRequest;


//use Illuminate\Support\Facades\Auth;

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
    /*
    public function viewProducto($categoriaId) {
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('producto.vistaProducto', compact('productos'));
    }
    */

    public function clienteProducto($categoriaId, Categorias $categorias) {
        $categorias = Categorias::all();
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('vistasCliente.mostrarProductos', compact('productos', 'categorias'));
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

    public function crearProducto(StoreProductoRequest $request,Categorias $categorias)
    {

        $categorias = Categorias::all();
        $nombre = $request -> nombre;
        $estado = $request -> estado;
        $fecha_publicacion = $request -> fecha_publicacion;
        $descripcion = $request -> descripcion;
        $cantidad = $request -> cantidad;
        $categoria_id = $request -> categoria_id;
        $propietario_id = Auth::id();

        $producto = new Producto();

        $producto->nombre = $nombre;
        $producto->estado = 'Propuesto';
        $producto->fecha_publicacion = $fecha_publicacion;
        $producto->descripcion = $descripcion;
        $producto->cantidad = $cantidad;
        $producto->categoria_id = $categoria_id;
        $producto->propietario_id = $propietario_id;
        $producto->save();

        return redirect()->route('vistasVendedor.registroProducto', compact('producto','categorias'));
    }

    public function kardex ($id) {
        $producto = Producto::find($id);
        if ($producto) 
            // Contar la cantidad de comentarios asociados al producto
            $cantidadComentarios = Comentario::where('producto_id', $id)->where('tipo', 'pregunta')
            ->count();

        return view('vistasSupervisor.kardexProducto', compact('producto', 'cantidadComentarios'));
    }
}