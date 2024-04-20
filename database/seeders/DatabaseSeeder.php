<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ClienteSeeder::class);
        $this->call(ContadorSeeder::class);
        $this->call(EncargadoSeeder::class);
        $this->call(SupervisorSeeder::class);
        $this->call(VendedorSeeder::class);
    }
}
