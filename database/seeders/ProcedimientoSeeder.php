<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Procedimiento;

class ProcedimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedimiento::create(["nombre"=>"Limpieza","precio"=>20]);
        Procedimiento::create(["nombre"=>"Blanqueamiento","precio"=>30]);
        Procedimiento::create(["nombre"=>"Implante","precio"=>25]);
    }
}
