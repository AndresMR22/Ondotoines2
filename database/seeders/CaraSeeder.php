<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cara;

class CaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cara::create(["nombre"=>"cara 1"]);
        Cara::create(["nombre"=>"cara 2"]);
        Cara::create(["nombre"=>"cara 3"]);
        Cara::create(["nombre"=>"cara 4"]);
        Cara::create(["nombre"=>"cara 5"]);
    }
}
