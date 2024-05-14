<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaccionCompra extends Model
{
    use HasFactory;
    protected $table = 'transaccion_compra';
    protected $fillable = ['voucher', 'calificacion', 'compra_id','valida'];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
