<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'estado','fecha_publicacion','motivo','descripcion','cantidad','categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categorias::class);
    }

    public function propietario(){
        return $this->belongsTo(Usuario::class);
    }
}