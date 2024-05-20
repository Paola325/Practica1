<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Mail\CorreoMailable;
use Illuminate\Support\Facades\Mail;

class CompraController extends Controller
{

    public function crearCompra($idProducto, $idUsuario)
    {
        $producto = Producto::find($idProducto);
        return view('comprar.crearCompra', compact('producto','idUsuario'));
    }


    public function guardarCompra(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'producto_id' => 'required|integer',
            'Usuario_id' => 'required|integer',
            'Cantidad' => 'required|integer|min:1',
        ]);

        // Obtener el producto
        $producto = Producto::findOrFail($request->producto_id);
        
        // Calcular el total
        $total = $producto->precio * $request->Cantidad;
        // Crear una nueva compra
        $compra = new Compra();
        $compra->producto_id = $request->producto_id;
        $compra->Usuario_id = $request->Usuario_id;
        $compra->Cantidad = $request->Cantidad;
        $compra->Total = $total;
        $compra->save();

        $producto->cantidad -= $request->Cantidad;
        $producto->save();
        $idCompra = $compra->id;

        // Obtener detalles del cliente
        $cliente = Usuario::findOrFail($request->Usuario_id);

        // Enviar correo al vendedor
        $email_vendedor = 'vendedor@example.com'; // Reemplaza con el correo del vendedor
        Mail::to($email_vendedor)->send(new CorreoMailable($producto, $request->Cantidad, $total, $cliente));
        
        return redirect()->route('formulario.transaccion', ['idCompra' => $idCompra]);
    }
}
