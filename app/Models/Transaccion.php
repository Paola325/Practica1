<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $table = 'transacciones';
    protected $fillable = ['voucher', 'calificacion', 'usuario_id','producto_id', 'valida'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
