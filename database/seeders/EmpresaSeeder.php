<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Empresa::create([
            "iva"=>12,
            "nombre"=>"Electromuebles Alexa",
            "direccion"=>"Calle Simón Plata Torres y Esmeraldas",
            "telefono"=>"0988703045",
            "telefono2"=>"0988703046",
            "correo"=>"electromueblesalexa@gmail.com",
        ]);
    }
}
