<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor@gmail.com',
            'apellido_paterno' => 'Gómez',
            'apellido_materno' => 'Ramírez',
            'nombre' => 'Carlos',
            'password' => bcrypt('vendedor@gmail.com'),
        ]);

        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor2@gmail.com',
            'apellido_paterno' => 'López',
            'apellido_materno' => 'Hernández',
            'nombre' => 'Ana',
            'password' => bcrypt('vendedor2@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor3@gmail.com',
            'apellido_paterno' => 'Martínez',
            'apellido_materno' => 'Díaz',
            'nombre' => 'Juan',
            'password' => bcrypt('vendedor3@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor4@gmail.com',
            'apellido_paterno' => 'Rodríguez',
            'apellido_materno' => 'Sánchez',
            'nombre' => 'Laura',
            'password' => bcrypt('vendedor4@gmail.com'),
        ]);
        
        Usuario::create([
            'role' => 'vendedor',
            'email' => 'vendedor5@gmail.com',
            'apellido_paterno' => 'García',
            'apellido_materno' => 'Fernández',
            'nombre' => 'José',
            'password' => bcrypt('vendedor5@gmail.com'),
        ]);
    }
}
