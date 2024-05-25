<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Producto;
use App\Models\Usuario;

class VentaNotificacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $producto;
    public $cantidad;
    public $total;
    public $cliente;

    public function __construct(Producto $producto, $cantidad, $total, Usuario $cliente)
    {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->total = $total;
        $this->cliente = $cliente;
    }

    public function build()
    {
        return $this->view('emails.correo_venta_vendedor')
                    ->subject('¡Has vendido un producto en nuestra tienda!');
    }
}


