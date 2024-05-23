<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Models\Compra;
use App\Models\TransaccionCompra;
use App\Models\Pago;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TransaccionController extends Controller
{
    //Se muestra el formulario de la transaccion
    public function crearFormulario($idCompra)
    {
        $compras = Compra::find($idCompra);
        
        return view('transaccion.formTransaccion', compact('compras'));
    }
    

    public function procesarTransaccion(Request $request)
    {
        $transaccion = new TransaccionCompra();

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
        $transaccion->compra_id = $request->compra_id;
        $transaccion->save();

        

        return redirect()->back()->with('success', '¡Guardado con éxito!');
    
    }

    

    //////// Desde contador ////////////////////////////

    public function mostrarTransaccion(){
        $transacciones = TransaccionCompra::all();

        return view('transaccion.mostrarTransaccion', compact('transacciones'));
    }


    public function validarTransaccion($id)
    {
        // Buscar la transacción por su ID
        $transaccion = TransaccionCompra::findOrFail($id);

        // Cambiar el valor de 'valida' a true
        $transaccion->valida = true;
        $transaccion->save();

        // Redireccionar de vuelta a la página anterior
        return redirect()->back();
    }


    ////crear nuevo pago///
    public function mostrarTransaccionPago()
    {
        // Obtener todas las transacciones de compra junto con sus compras asociadas
        $transacciones = TransaccionCompra::with('compra')->get();
        $compras = Compra::with('producto')->get();
        
        // Identificar las transacciones que tienen pagos asociados
        $transaccionesSinPago = [];
        foreach ($transacciones as $transaccion) {
            $tienePago = Pago::where('transaccion_id', $transaccion->id)->exists();
            if (!$tienePago) {
                $transaccionesSinPago[] = $transaccion;
            }
        }

        return view('transaccion.mostrarTransaccionesValidas', compact('transaccionesSinPago', 'compras'));
    }



    public function crearPago(Request $request){
        //dd($request->all());

        $transaccionId = $request->transaccion_id;
        $montoPago = $request->pago;

        $pago = new Pago();
        $pago->monto = $montoPago;
        $pago->transaccion_id = $transaccionId;
        $pago->save();
        
        return redirect()->back()->with('success', 'Los pagos se han enviado correctamente.');
        
    }

    public function ShowPagos()
    {
        $pagos = Pago::all();
        return view('pago.mostrarPago', compact('pagos'));
    }

    public function Entregado()
    {
        $pagos = Pago::all();
        return view('pago.cambiarEntregado', compact('pagos'));
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

    public function tablero()
    {
        $numUsuarios = Usuario::count();
        $numTransacciones = TransaccionCompra::count();
        $numProductosNoConsignados = Producto::where('estado', '!=', 'Consignado')->count();
        $numProductosConsignados = Producto::where('estado', 'Consignado')->count();
        $numCompras = Compra::count();
        $numPagos= Pago::count();
        $numPreguntas = Comentario::where('tipo', 'pregunta')->count();
        $numRespuestas = Comentario::where('tipo', 'respuesta')->count();

        return view('vistasSupervisor.tablero', compact('numUsuarios', 'numTransacciones', 'numProductosNoConsignados','numProductosConsignados','numCompras','numPagos','numPreguntas','numRespuestas'));
    }

}
