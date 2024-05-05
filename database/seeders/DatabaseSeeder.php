<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
            VendedorSeeder::class,
            ClienteSeeder::class,
            ContadorSeeder::class,
            EncargadoSeeder::class,
            SupervisorSeeder::class,
        ]);        
    }
}
