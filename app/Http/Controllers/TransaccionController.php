<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Models\Pago;
use App\Models\Usuario;
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


    ////////////////////////////////////////////////////////////////

    public function mostrarTransaccionValidos(){
        $transacciones = Transaccion::all();

        return view('usuarios.mostrarTransaccionesValidas', compact('transacciones'));
    }




    public function crearPago()
    {
        $vendedores = Usuario::where('role', 'vendedor')->get();

        foreach ($vendedores as $vendedor) {
            $transaccionesVendedor = Transaccion::where('producto_id', $vendedor->id)->get();

            if ($transaccionesVendedor->isNotEmpty()) {
                $montoTotalVendedor = 0;

                // Verificar si todas las transacciones del vendedor están marcadas como válidas
                $transaccionesValidas = $transaccionesVendedor->where('valida', true);

                if ($transaccionesValidas->count() === $transaccionesVendedor->count()) {
                    // Calcular el monto total de las transacciones del vendedor
                    foreach ($transaccionesVendedor as $transaccion) {
                        $precioProducto = Producto::find($transaccion->producto_id)->precio;
                        $montoTotalVendedor += $precioProducto;
                    }

                    // Guardar el pago solo si todas las transacciones son válidas
                    $pago = new Pago();
                    $pago->monto = $montoTotalVendedor;
                    $pago->save();
                    
                    // Devolver la vista con el pago
                    return view('usuarios.pago', compact('pago'));
                }
            }
        }

        // En caso de no haber pagos válidos, devolver la vista sin ningún pago
        return view('usuarios.pago');
    }


    public function ShowPagos()
    {
        $pagos = Pago::all();
        return view('usuarios.mostrarPago', compact('pagos'));
    }

    public function Entregado()
    {
        $pagos = Pago::all();
        return view('usuarios.cambiarEntregado', compact('pagos'));
    }

    public function EntregarPago($id)
    {
        // Buscar la transacción por su ID
        $pagos = Pago::findOrFail($id);

        // Cambiar el valor de 'valida' a true
        $pagos->entregado = true;
        $pagos->save();

        // Redireccionar de vuelta a la página anterior
        return redirect()->back();
    }

}
