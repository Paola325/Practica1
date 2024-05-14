<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;
use App\Models\Comentario;
use App\Models\Compra;
use App\Models\Foto;
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
        return view('producto.consignados', compact('productos'));
    }
    
    public function viewProducto($categoriaId) {
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('producto.index', compact('productos'));
    }
    

    public function clienteProducto($categoriaId, Categorias $categorias) {
        $categorias = Categorias::all();
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('vistasCliente.mostrarProductos', compact('productos', 'categorias'));
    }

    public function anonimoProducto($categoriaId, Categorias $categorias) {
        $categorias = Categorias::all();
        $productos = Producto::where('categoria_id', $categoriaId)->get();
        return view('producto.index', compact('productos', 'categorias'));
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
    public function rechazar(UpdateProductoRequest $request, Producto $producto)
    {
        // Encuentra el producto específico por su ID
        $producto = Producto::findOrFail($request->id);
        $motivo = $request-> motivo;
        // Actualiza el estado del producto a "Reachazado"
        $producto->estado = 'Rechazado';
        $producto-> motivo = $motivo;
        $producto->save();

        // Redirige a la ruta porConsignar con el parámetro categoriaId
        return redirect()->route('porConsignar', ['categoriaId' => $producto->categoria_id]);

    }

        //Desconsignar o rechazar Propuesta de un producto
        public function desConsignar(UpdateProductoRequest $request, Producto $producto)
        {
            // Encuentra el producto específico por su ID
            $producto = Producto::findOrFail($request->id);
            $motivo = $request-> motivo;
            // Actualiza el estado del producto a "Reachazado"
            $producto->estado = 'Rechazado';
            $producto-> motivo = $motivo;
            $producto->save();
            Comentario::where('producto_id', $producto->id)->delete();
    
            // Redirige a la ruta porConsignar con el parámetro categoriaId
            return redirect()->route('producto.consignados', ['categoriaId' => $producto->categoria_id]);
    
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
        $precio = $request -> precio;
        $cantidad = $request -> cantidad;
        $categoria_id = $request -> categoria_id;
        $propietario_id = Auth::id();

        $producto = new Producto();

        $producto->nombre = $nombre;
        $producto->estado = 'Propuesto';
        $producto->fecha_publicacion = $fecha_publicacion;
        $producto->descripcion = $descripcion;
        $producto->precio = $precio;
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
            // Contar la cantidad de compras asociados al producto
            $cantidadCompras = Compra::where('producto_id', $id)->count();


        return view('vistasSupervisor.kardexProducto', compact('producto', 'cantidadComentarios', 'cantidadCompras'));
    }
}


    public function formularioActualizarProducto($id_producto)
    {
        // Obtener el producto a actualizar
        $producto = Producto::findOrFail($id_producto);
        

        return view('producto.actualizarProductoVendedor', compact('producto'));
    }

    public function actualizarProducto(Request $request)
    {
        // Recuperar el ID del producto desde la solicitud
        $id_producto = $request->id_producto;
        $producto = Producto::find($id_producto);

        // Verificar si el producto está en estado "Propuesto"
        if ($producto->estado === 'Propuesto') {
            // Actualizar los atributos del producto con los nuevos valores de la solicitud
            $producto->nombre = $request->nombre;
            $producto->fecha_publicacion = $request->fecha_publicacion;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->cantidad = $request->cantidad;
            $producto->categoria_id = $request->categoria_id;

            // Guardar los cambios en la base de datos
            $producto->save();

            // Redireccionar de vuelta a la vista anterior con un mensaje de éxito
            return redirect()->back()->with('success', 'Producto actualizado correctamente.');
        } else {
            // El producto no está en estado "Propuesto", mostrar mensaje de alerta
            return redirect()->back()->with('alert', 'No se puede actualizar un producto consignado.');
        }
    }


    public function agregarFoto($id_producto) {
        $producto = Producto::find($id_producto);
        return view('vistasVendedor.formAgregarFoto', compact('producto'));
    }


    public function agregarFotoProducto(Request $request) {
        //dd($request->all());
        
        $id_producto = $request->id_producto;
        $producto = Producto::find($id_producto);
        $foto = new Foto();
        
        if ($producto->estado === 'Propuesto') {
            if ($request->hasFile('foto')) {
                // Obtener el archivo de la solicitud
                $file = $request->file('foto');
                // Definir la ruta de destino dentro del almacenamiento de Laravel
                $destinPath = 'foto/';
                // Generar un nombre único para el archivo
                $filename = time() . '-' . $file->getClientOriginalName();
                // Almacenar el archivo en el sistema de archivos utilizando el almacenamiento de Laravel
                $uploadSuccess = $request->file('foto')->move($destinPath, $filename);
                $foto->foto = $destinPath . $filename; //concatenar la ruta del archivo
            } 
            $foto->producto_id = $id_producto;
            $foto->save();
            return redirect()->back()->with('success', '¡Guardado con éxito!');
        } else {
            // El producto no está en estado "Propuesto", mostrar mensaje de alerta
            return redirect()->back()->with('alert', 'No se puede agregar foto a un producto consignado.');
        }
    }

    public function eliminarProducto($id_producto){
        // Buscar el producto por su ID
        $producto = Producto::find($id_producto);
    
        // Verificar si el producto existe
        if($producto){
            // Eliminar las fotos relacionadas con el producto
            Foto::where('producto_id', $id_producto)->delete();
    
            // Eliminar el producto
            $producto->delete();
    
            // Redirigir con un mensaje de éxito
            return redirect()->back()->with('success', '¡Producto eliminado correctamente!');
        } else {
            // Si el producto no existe, redirigir con un mensaje de error
            return redirect()->back()->with('error', 'El producto no existe o ya ha sido eliminado.');
        }
    }
    
    public function mostrarFoto()
    {
        // Obtener todas las fotos
        $fotos = Foto::all();

        // Pasar los datos a la vista y renderizarla
        return view('producto.mostrarFotos', compact('fotos'));
    }

    public function eliminarFoto($id_foto)
    {
        // Buscar la foto por su ID
        $foto = Foto::find($id_foto);
        $foto->delete();
    }

}


