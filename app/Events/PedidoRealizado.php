<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Producto;
use App\Models\Usuario;

class PedidoRealizado
{
    use Dispatchable, SerializesModels;

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
}

