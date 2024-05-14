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
                'texto' => '¿Tiene talla chica y color azul?',
                'tipo' => 'pregunta',
                'producto_id' => 1,
            ],
            [
                'texto' => '¿Qué tipo de tela tiene este pantalón?',
                'tipo' => 'pregunta',
                'producto_id' => 2,
            ],
            [
                'texto' => '¿Tiene color rosado?',
                'tipo' => 'pregunta',
                'producto_id' => 1,
            ],
            [
                'texto' => '¿Tiene color chico?',
                'tipo' => 'pregunta',
                'producto_id' => 1,
            ],
            [
                'texto' => '¿Qué tipo de tela tiene este pantalón?',
                'tipo' => 'pregunta',
                'producto_id' => 2,
            ],
            [
                'texto' => '¿Tiene color girs disponible',
                'tipo' => 'pregunta',
                'producto_id' => 1,
            ],
            [
                'texto' => '¿Qué colores hay?',
                'tipo' => 'pregunta',
                'producto_id' => 2,
            ],
            [
                'texto' => 'Tiene mas productos?',
                'tipo' => 'pregunta',
                'producto_id' => 1,
            ],
            [
                'texto' => '¿Tiene talla grande?',
                'tipo' => 'pregunta',
                'producto_id' => 2,
            ],
            [
                'texto' => 'No tenemos color gris',
                'tipo' => 'respuesta',
                'producto_id' => 1,
            ],
            [
                'texto' => 'Color negro ',
                'tipo' => 'respuesta',
                'producto_id' => 2,
            ],
            [
                'texto' => 'Si hay',
                'tipo' => 'respuesta',
                'producto_id' => 1,
            ],
            [
                'texto' => 'No hay mas tallas',
                'tipo' => 'respuesta',
                'producto_id' => 2,
            ],
            [
                'texto' => 'Si hay color rojo',
                'tipo' => 'respuesta',
                'producto_id' => 1,
            ],
        ];

        foreach ($comentarios as $comentario) {
            $nuevo = new Comentario();
            $nuevo->fill($comentario);
            $nuevo->save();
        }
    }
}
