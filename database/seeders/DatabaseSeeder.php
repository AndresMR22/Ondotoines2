<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(TablePermission::class);
        $this->call(EmpresaSeeder::class);
        $this->call(ProcedimientoSeeder::class);
        $this->call(PacienteSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
