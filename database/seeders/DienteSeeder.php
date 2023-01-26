<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diente;

class DienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 11 ; $i<=18 ; $i++)
        {
           Diente::create(["posicion"=>$i]);
        }
        for($i = 21 ; $i<=28 ; $i++)
        {
           Diente::create(["posicion"=>$i]);
        }
        for($i = 41 ; $i<=48 ; $i++)
        {
           Diente::create(["posicion"=>$i]);
        }
        for($i = 31 ; $i<=38 ; $i++)
        {
           Diente::create(["posicion"=>$i]);
        }
    }
}
