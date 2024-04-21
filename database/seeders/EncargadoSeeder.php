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
            'password' => bcrypt('encargado@gmail.com'),
        ]);
    }
}