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
            'email' => 'comprador@gmail.com',
            'apellido_paterno' => 'Dominguez',
            'apellido_materno' => 'Belisario',
            'nombre' => 'Tomas',
            'password' => bcrypt('comprador@gmail.com'),
            'role' => 'cliente',
        ]);

        Usuario::create([
            'role' => 'cliente',
            'email' => 'comprador2@gmail.com',
            'apellido_paterno' => 'González',
            'apellido_materno' => 'Sánchez',
            'nombre' => 'Juan',
            'password' => bcrypt('comprador2@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'cliente',
            'email' => 'comprador3@gmail.com',
            'apellido_paterno' => 'Rodríguez',
            'apellido_materno' => 'Martínez',
            'nombre' => 'Laura',
            'password' => bcrypt('comprador3@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'cliente',
            'email' => 'comprador4@gmail.com',
            'apellido_paterno' => 'López',
            'apellido_materno' => 'Gómez',
            'nombre' => 'Pedro',
            'password' => bcrypt('comprador4@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'cliente',
            'email' => 'comprador5@gmail.com',
            'apellido_paterno' => 'Fernández',
            'apellido_materno' => 'Hernández',
            'nombre' => 'Ana',
            'password' => bcrypt('comprador5@gmail.com'),
        ]);
    }
}