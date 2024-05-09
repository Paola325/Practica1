<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;


class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'email' => 'cliente@gmail.com',
            'apellido_paterno' => 'Dominguez',
            'apellido_materno' => 'Belisario',
            'nombre' => 'Tomas',
            'password' => bcrypt('cliente@gmail.com'),
            'role' => 'cliente',
        ]);

        Usuario::create([
            'role' => 'cliente',
            'email' => 'cliente2@gmail.com',
            'apellido_paterno' => 'González',
            'apellido_materno' => 'Sánchez',
            'nombre' => 'Juan',
            'password' => bcrypt('cliente2@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'cliente',
            'email' => 'cliente3@gmail.com',
            'apellido_paterno' => 'Rodríguez',
            'apellido_materno' => 'Martínez',
            'nombre' => 'Laura',
            'password' => bcrypt('cliente3@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'cliente',
            'email' => 'cliente4@gmail.com',
            'apellido_paterno' => 'López',
            'apellido_materno' => 'Gómez',
            'nombre' => 'Pedro',
            'password' => bcrypt('cliente4@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'cliente',
            'email' => 'cliente5@gmail.com',
            'apellido_paterno' => 'Fernández',
            'apellido_materno' => 'Hernández',
            'nombre' => 'Ana',
            'password' => bcrypt('cliente5@gmail.com'),
        ]);
    }
}