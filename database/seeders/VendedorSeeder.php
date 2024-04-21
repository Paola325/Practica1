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
            'password' => bcrypt('vendedor@gmail.com'),
        ]);
    }
}
