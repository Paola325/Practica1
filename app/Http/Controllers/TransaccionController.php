<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TransaccionController extends Controller
{
    public function crearFormulario($id)
    {
        $productos = Producto::findOrFail($id);
        
        return view('usuarios.transaccion', compact('productos'));
    }


    public function procesarTransaccion(Request $request)
    {
        $transaccion = new Transaccion();

        if ($request->hasFile('voucher')) {
            // Obtener el archivo de la solicitud
            $file = $request->file('voucher');
            // Definir la ruta de destino dentro del almacenamiento de Laravel
            $destinPath = 'voucher/';
            // Generar un nombre único para el archivo
            $filename = time() . '-' . $file->getClientOriginalName();
            // Almacenar el archivo en el sistema de archivos utilizando el almacenamiento de Laravel
            $uploadSuccess = $request->file('voucher')->move($destinPath, $filename);
            $transaccion->voucher = $destinPath . $filename; //concatenar la ruta del archivo
        } 
        
        $transaccion->calificacion = $request->calificacion;
        $transaccion->usuario_id = $request->usuario_id;
        $transaccion->producto_id = $request->producto_id;
        $transaccion->save();

        return redirect()->back();
    }

    public function mostrarTransaccion(){
        $transacciones = Transaccion::all();

        return view('usuarios.mostrarTransaccion', compact('transacciones'));
    }

    public function validarTransaccion($id)
    {
        // Buscar la transacción por su ID
        $transaccion = Transaccion::findOrFail($id);

        // Cambiar el valor de 'valida' a true
        $transaccion->valida = true;
        $transaccion->save();

        // Redireccionar de vuelta a la página anterior
        return redirect()->back();
    }

}
