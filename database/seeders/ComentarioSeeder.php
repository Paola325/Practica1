<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comentarios = [
            [
                'texto' => '¿Este producto está disponible en otros colores?',
                'tipo' => 'pregunta',
                'producto_id' => 1,
            ],
            [
                'texto' => 'Lo siento, este producto solo está disponible en rojo.',
                'tipo' => 'respuesta',
                'producto_id' => 1,
            ],
            [
                'texto' => '¿Qué tipo de tela tiene este pantalón?',
                'tipo' => 'pregunta',
                'producto_id' => 2,
            ],
            
        ];

        foreach ($comentarios as $comentario) {
            $nuevo = new Comentario();
            $nuevo->fill($comentario);
            $nuevo->save();
        }
    }
}
