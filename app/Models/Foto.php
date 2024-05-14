<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_producto'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
