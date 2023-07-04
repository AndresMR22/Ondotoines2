<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proceso;

class ProcesoSeeder extends Seeder
{

    public function run()
    {



            Proceso::create(["especialidad"=>"1","nombre"=>"Do","descripcion"=>"Diente Obturado","color"=>"blue"]);
            Proceso::create(["especialidad"=>"1","nombre"=>"C","descripcion"=>"Cariado","color"=>"red"]);
            Proceso::create(["especialidad"=>"1","nombre"=>"=","descripcion"=>"Ausente","color"=>"blue"]);
            Proceso::create(["especialidad"=>"1","nombre"=>"X","descripcion"=>"Exodoncia","color"=>"red"]);
            Proceso::create(["especialidad"=>"1","nombre"=>"CP","descripcion"=>"Caries penetrante","color"=>"red"]);
            Proceso::create(["especialidad"=>"1","nombre"=>"M","descripcion"=>"Retenido","color"=>"red"]);
            Proceso::create(["especialidad"=>"1","nombre"=>"PP","descripcion"=>"Pieza de puente","color"=>"blue"]);

            Proceso::create(["especialidad"=>"2","nombre"=>"Co","descripcion"=>"Corona","color"=>"blue"]);
            Proceso::create(["especialidad"=>"2","nombre"=>"Pr","descripcion"=>"Protesis removible","color"=>"blue"]);
            Proceso::create(["especialidad"=>"2","nombre"=>"Inc","descripcion"=>"Incrustación","color"=>"blue"]);
            Proceso::create(["especialidad"=>"2","nombre"=>"EP","descripcion"=>"Enfermedad periodental","color"=>"red"]);
            Proceso::create(["especialidad"=>"2","nombre"=>"FD","descripcion"=>"Fractura dental","color"=>"red"]);
            Proceso::create(["especialidad"=>"2","nombre"=>"MPD","descripcion"=>"Mala posición dental","color"=>"red"]);
            Proceso::create(["especialidad"=>"2","nombre"=>"PM","descripcion"=>"Perno Muñon","color"=>"blue"]);

            Proceso::create(["especialidad"=>"3","nombre"=>"TC","descripcion"=>"Tratamiento de CLO","color"=>"blue"]);
            Proceso::create(["especialidad"=>"3","nombre"=>"F","descripcion"=>"Fluoresis","color"=>"red"]);
            Proceso::create(["especialidad"=>"3","nombre"=>"Imp","descripcion"=>"Implante dental","color"=>"blue"]);
            Proceso::create(["especialidad"=>"3","nombre"=>"MB","descripcion"=>"Mancha blanca","color"=>"red"]);
            Proceso::create(["especialidad"=>"3","nombre"=>"Sc","descripcion"=>"Sellador","color"=>"blue"]);
            Proceso::create(["especialidad"=>"3","nombre"=>"SP SR","descripcion"=>"Surco profundo","color"=>"blue"]);
            Proceso::create(["especialidad"=>"3","nombre"=>"Hp","descripcion"=>"Hipoplasia de esmalte","color"=>"blue"]);


    }
}
