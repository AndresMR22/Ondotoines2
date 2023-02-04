<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proceso;

class ProcesoSeeder extends Seeder
{
    
    public function run()
    {
        
       
          
            Proceso::create(["nombre"=>"Do","descripcion"=>"Diente Obturado","color"=>"blue"]);
            Proceso::create(["nombre"=>"C","descripcion"=>"Cariado","color"=>"red"]);
            Proceso::create(["nombre"=>"=","descripcion"=>"Ausente","color"=>"blue"]);
            Proceso::create(["nombre"=>"X","descripcion"=>"Exodoncia","color"=>"red"]);
            Proceso::create(["nombre"=>"CP","descripcion"=>"Caries penetrante","color"=>"red"]);
            Proceso::create(["nombre"=>"M","descripcion"=>"Retenido","color"=>"red"]);
            Proceso::create(["nombre"=>"PP","descripcion"=>"Pieza de puente","color"=>"blue"]);

            Proceso::create(["nombre"=>"Co","descripcion"=>"Corona","color"=>"blue"]);
            Proceso::create(["nombre"=>"Pr","descripcion"=>"Protesis removible","color"=>"blue"]);
            Proceso::create(["nombre"=>"Inc","descripcion"=>"Incrustación","color"=>"blue"]);
            Proceso::create(["nombre"=>"EP","descripcion"=>"Enfermedad periodental","color"=>"red"]);
            Proceso::create(["nombre"=>"FD","descripcion"=>"Fractura dental","color"=>"red"]);
            Proceso::create(["nombre"=>"MPD","descripcion"=>"Mala posición dental","color"=>"red"]);
            Proceso::create(["nombre"=>"PM","descripcion"=>"Perno Muñon","color"=>"blue"]);

            Proceso::create(["nombre"=>"TC","descripcion"=>"Tratamiento de CLO","color"=>"blue"]);
            Proceso::create(["nombre"=>"F","descripcion"=>"Fluoresis","color"=>"red"]);
            Proceso::create(["nombre"=>"Imp","descripcion"=>"Implante dental","color"=>"blue"]);
            Proceso::create(["nombre"=>"MB","descripcion"=>"Mancha blanca","color"=>"red"]);
            Proceso::create(["nombre"=>"Sc","descripcion"=>"Sellador","color"=>"blue"]);
            Proceso::create(["nombre"=>"SP SR","descripcion"=>"Surco profundo","color"=>"blue"]);
            Proceso::create(["nombre"=>"Hp","descripcion"=>"Hipoplasia de esmalte","color"=>"blue"]);
            
        
    }
}
