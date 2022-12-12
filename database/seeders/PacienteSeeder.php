<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paciente::create([
            "nombre"=>"Andres",
            "apellido"=>"Morales",
            "edad"=>"24",
            "lugar_nac"=>"Cuenca",
            "ocupacion"=>"Dev",
            "direccion"=>"Sto Dgo",
            "cedula"=>"2100463187",
            "telefono"=>"0988703045",
            "sexo"=>"M",
            "observacion"=>"",
        ]);

        Paciente::create([
            "nombre"=>"Daniel",
            "apellido"=>"Molina",
            "edad"=>"25",
            "lugar_nac"=>"Macas",
            "ocupacion"=>"Dev",
            "direccion"=>"Macas",
            "cedula"=>"2100463187",
            "telefono"=>"0988703043",
            "sexo"=>"M",
            "observacion"=>"",
        ]);
    }
}
