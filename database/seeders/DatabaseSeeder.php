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
        $this->call(DienteSeeder::class);
        $this->call(CaraSeeder::class);
        $this->call(TratamientoSeeder::class);
        $this->call(OdontogramaSeeder::class);
        $this->call(ProcesoSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
