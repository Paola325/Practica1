<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Mail\CorreoMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Events\PedidoRealizado;

class CompraController extends Controller
{

    public function crearCompra($idProducto, $idUsuario)
    {
        $producto = Producto::find($idProducto);
        return view('comprar.crearCompra', compact('producto','idUsuario'));
    }

    public function guardarCompra(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|integer',
            'Usuario_id' => 'required|integer',
            'Cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);
        
        // Verificar si la cantidad solicitada es mayor que la cantidad disponible
        if ($request->Cantidad > $producto->cantidad) {
            throw ValidationException::withMessages(['Cantidad' => 'Cantidad solicitada excede la cantidad disponible.']);
        }

        // Calcular el total
        $total = $producto->precio * $request->Cantidad;

        // Crear una nueva compra
        $compra = new Compra();
        $compra->producto_id = $request->producto_id;
        $compra->Usuario_id = $request->Usuario_id;
        $compra->Cantidad = $request->Cantidad;
        $compra->Total = $total;
        $compra->save();

        // Actualizar la cantidad de producto disponible
        $producto->cantidad -= $request->Cantidad;
        $producto->save();
        $idCompra = $compra->id;

        // Obtener detalles del cliente
        $cliente = Usuario::findOrFail($request->Usuario_id);

        // Disparar el evento PedidoRealizado
        event(new PedidoRealizado($producto, $request->Cantidad, $total, $cliente));

        // Redirigir a la página de transacción con el ID de compra
        return redirect()->route('formulario.transaccion', ['idCompra' => $idCompra]);
    }

}
