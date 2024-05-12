<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function guardarCompra(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_producto' => 'required|integer',
            'id_cliente' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|integer',
        ]);

        // Obtener el producto
        $producto = Producto::findOrFail($request->id_producto);

        // Calcular el total
        $total = $producto->precio * $request->cantidad;
        // Crear una nueva compra
        $compra = new Compra();
        $compra->id_producto = $request->id_producto;
        $compra->id_cliente = $request->id_cliente;
        $compra->cantidad = $request->cantidad;
        $compra->total = $total;
        $compra->save();

        // Redirigir de vuelta a la página anterior
        return redirect()->back();
    }
}
