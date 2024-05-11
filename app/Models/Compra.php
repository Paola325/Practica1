<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compra';

    protected $fillable = [
        'id_producto',
        'id_cliente',
        'cantidad',
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    // Relación con el modelo Cliente
    public function cliente(){
        return $this->belongsTo(Usuario::class, 'id_cliente');
    }
}
