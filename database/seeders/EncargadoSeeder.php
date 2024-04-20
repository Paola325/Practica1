<?php

namespace Database\Seeders;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class EncargadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'email' => 'encargado@gmail.com',
            'password' => bcrypt('encargado@gmail.com'),
            'role' => 'encargado',
        ]);
    }
}
