<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PedidoRealizado;
use App\Mail\CorreoMailable;
use App\Mail\VentaNotificacionMailable;
use Illuminate\Support\Facades\Mail;

class EnviarCorreoPedido
{
    public function handle(PedidoRealizado $event): void
    {
        // Enviar correo al propietario del producto
        $propietario = $event->producto->propietario;  
        Mail::to($propietario->email)->send(new VentaNotificacionMailable($event->producto, $event->cantidad, $event->total, $event->cliente));
    }
}


