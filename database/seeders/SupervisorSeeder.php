<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;


class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'role' => 'supervisor',
            'email' => 'supervisor@gmail.com',
            'apellido_paterno' => 'Pérez',
            'apellido_materno' => 'García',
            'nombre' => 'María',
            'password' => bcrypt('supervisor@gmail.com'),
        ]);

        Usuario::create([
            'role' => 'supervisor',
            'email' => 'supervisor2@gmail.com',
            'apellido_paterno' => 'Pérez',
            'apellido_materno' => 'López',
            'nombre' => 'Ana',
            'password' => bcrypt('supervisor2@gmail.com'),
        ]);
    }
}
