<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario_id',
        'monto',
        'entregado',
    ];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Usuario::class);
    }
}
