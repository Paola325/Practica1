<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comentario;

class ComentarioSeeder extends Seeder
{

    public function run()
    {
        Comentario::create([
            'texto' => '¿Este producto está disponible en otros colores?',
            'tipo' => 'pregunta',
            'producto_id' => 1,
            'comprador_id' => 6,
        ]);
        Comentario::create([
            'texto' => '¿El tamaño de la cintura es ajustable?',
            'tipo' => 'pregunta',
            'producto_id' => 2,
            'comprador_id' => 7,
        ]);
        Comentario::create([
            'texto' => '¿Este vestido tiene algún tipo de ajuste en la cintura?',
            'tipo' => 'pregunta',
            'producto_id' => 3,
            'comprador_id' => 8,
        ]);
        Comentario::create([
            'texto' => '¿Cómo es la calidad del tejido de esta camisa?',
            'tipo' => 'pregunta',
            'producto_id' => 4,
            'comprador_id' => 9,
        ]);
        Comentario::create([
            'texto' => '¿Puedes proporcionar las medidas para la talla pequeña?',
            'tipo' => 'pregunta',
            'producto_id' => 5,
            'comprador_id' => 10,
        ]);
        Comentario::create([
            'texto' => '¿La impresión en la playera es resistente a los lavados?',
            'tipo' => 'pregunta',
            'producto_id' => 6,
            'comprador_id' => 6,
        ]);
        Comentario::create([
            'texto' => '¿El tamaño de la cintura es ajustable?',
            'tipo' => 'pregunta',
            'producto_id' => 7,
            'comprador_id' => 7,
        ]);
        Comentario::create([
            'texto' => '¿Este vestido es adecuado para una ocasión formal o más casual?',
            'tipo' => 'pregunta',
            'producto_id' => 8,
            'comprador_id' => 8,
        ]);
        Comentario::create([
            'texto' => '¿Puedes proporcionar las medidas para la talla pequeña?',
            'tipo' => 'pregunta',
            'producto_id' => 9,
            'comprador_id' => 9,
        ]);
        Comentario::create([
            'texto' => '¿Cómo puedo cuidar adecuadamente este vestido para mantener su calidad?',
            'tipo' => 'pregunta',
            'producto_id' => 10,
            'comprador_id' => 10,
        ]);

        


        Comentario::create([
            'texto' => 'No, solo está disponible en rojo',
            'tipo' => 'respuesta',
            'producto_id' => 1,
            'comprador_id' => 1,
        ]);
        Comentario::create([
            'texto' => 'Sí, el tamaño de la cintura de este producto es ajustable',
            'tipo' => 'respuesta',
            'producto_id' => 2,
            'comprador_id' => 2,
        ]);
        Comentario::create([
            'texto' => 'Sí, este vestido cuenta con un cinturón ajustable que te permite ajustarlo según tu preferencia y comodidad',
            'tipo' => 'respuesta',
            'producto_id' => 3,
            'comprador_id' => 3,
        ]);
        Comentario::create([
            'texto' => 'Utilizamos materiales de alta calidad que son suaves al tacto, transpirables y duraderos',
            'tipo' => 'respuesta',
            'producto_id' => 4,
            'comprador_id' => 4,
        ]);
        Comentario::create([
            'texto' => 'Las medidas son las siguientes: el ancho de hombros es de aproximadamente 38 centímetros, el contorno de pecho es de alrededor de 86 centímetros y la longitud de manga es de aproximadamente 58 centímetros',
            'tipo' => 'respuesta',
            'producto_id' => 5,
            'comprador_id' => 5,
        ]);

    }
}
