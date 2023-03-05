<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tratamiento;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tratamiento = Tratamiento::create([
            // "asunto"=>"Tratamiento Prueba 1",
            "observacion"=>"Observación de prueba",
            "especialidad"=>"Especialidad de prueba",
            "medico"=>"Jorge",
            "paciente_id"=>1,
        ]);
    }
}
