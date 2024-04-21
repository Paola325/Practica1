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
        $this->call(ClienteSeeder::class);
        $this->call(ContadorSeeder::class);
        $this->call(EncargadoSeeder::class);
        $this->call(SupervisorSeeder::class);
        $this->call(VendedorSeeder::class);
    }
}
