<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Odontograma;

class OdontogramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Odontograma::create([
            "observacion"=>"Observación de prueba",
            "paciente_id"=>1
        ]);

    }
}
