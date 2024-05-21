<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $producto;
    public $cantidad;
    public $total;
    public $cliente;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($producto, $cantidad, $total, $cliente)
    {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->total = $total;
        $this->cliente = $cliente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo Pedido Realizado')
                    ->view('emails.correo');
    }
}
