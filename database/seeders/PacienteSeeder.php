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
            "fecha_nac"=>"1998-08-13",
            "lugar_nac"=>"Cuenca",
            "ocupacion"=>"Dev",
            "direccion"=>"Sto Dgo",
            "correo"=> "gamr21@outlook.es",
            "cedula"=>"2100463187",
            "telefono"=>"0988703045",
            "sexo"=>"M",
            "observacion"=>"",
        ]);

        Paciente::create([
            "nombre"=>"Daniel",
            "apellido"=>"Molina",
            "fecha_nac"=>"1998-10-11",
            "lugar_nac"=>"Macas",
            "ocupacion"=>"Dev",
            "correo"=> "daniel@gmail.com",
            "direccion"=>"Macas",
            "cedula"=>"2100463187",
            "telefono"=>"0988703043",
            "sexo"=>"M",
            "observacion"=>"",
        ]);
    }
}
