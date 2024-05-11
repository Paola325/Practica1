<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TransaccionController extends Controller
{
    public function crearFormulario()
    {
        return view('usuarios.transaccion');
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
        $transaccion->save();

        return redirect()->back();
    }

}
