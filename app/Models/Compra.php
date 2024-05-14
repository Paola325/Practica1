<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'compras'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_producto',
        'id_cliente',
        'metodo_de_pago',
        'cantidad',
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Usuario::class);
    }
}
