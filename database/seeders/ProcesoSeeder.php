<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proceso;

class ProcesoSeeder extends Seeder
{
    
    public function run()
    {
        for($i = 1 ; $i<=21 ; $i++)
        {
            Proceso::create([
                "nombre"=>"a".$i
            ]);
        }
    }
}
