<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;

class CompraController extends Controller
{
    public function guardarCompra(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_producto' => 'required|integer',
            'id_cliente' => 'required|integer',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Crear una nueva compra
        $compra = new Compra();
        $compra->id_producto = $request->id_producto;
        $compra->id_cliente = $request->id_cliente;
        $compra->cantidad = $request->cantidad;
        $compra->save();

        // Redirigir de vuelta a la página anterior
        return redirect()->back();
    }
}
