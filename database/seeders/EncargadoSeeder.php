<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class EncargadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'role' => 'encargado',
            'email' => 'encargado@gmail.com',
            'apellido_paterno' => 'Bonilla',
            'apellido_materno' => 'Palomeque',
            'nombre' => 'Diego',
            'password' => bcrypt('encargado@gmail.com'),
        ]);
        Usuario::create([
            'role' => 'encargado',
            'email' => 'encargado2@gmail.com',
            'apellido_paterno' => 'González',
            'apellido_materno' => 'López',
            'nombre' => 'Laura',
            'password' => bcrypt('encargado2@gmail.com'),
        ]);
        Usuario::create([
            'role' => 'encargado',
            'email' => 'encargado3@gmail.com',
            'apellido_paterno' => 'Martínez',
            'apellido_materno' => 'Sánchez',
            'nombre' => 'Javier',
            'password' => bcrypt('encargado3@gmail.com'),
        ]);
    }
}