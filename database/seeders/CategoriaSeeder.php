<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorias;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nueva = new Categorias();
        $nueva->nombre="Playeras";
        $nueva->save();
        $nueva = new Categorias();
        $nueva->nombre="Pantalones";
        $nueva->save();
        $nueva = new Categorias();
        $nueva->nombre="Vestidos";
        $nueva->save();
        $nueva = new Categorias();
        $nueva->nombre="Camisas";
        $nueva->save();
        $nueva = new Categorias();
        $nueva->nombre="Trajes";
        $nueva->save();
    }
}
