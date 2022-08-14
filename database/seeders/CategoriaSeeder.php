<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $electrodomestico =  Categoria::create(["nombre"=>"Electrodomesticos"]);
       $mueble =  Categoria::create(["nombre"=>"Muebles"]);
       $plastico = Categoria::create(["nombre"=>"Plasticos"]);
       $vario =  Categoria::create(["nombre"=>"Varios"]);

       $electrodomestico->subcategorias()->create(["nombre"=>"Nevera","categoria_id"=>$electrodomestico->id]);
       $electrodomestico->subcategorias()->create(["nombre"=>"Cocina","categoria_id"=>$electrodomestico->id]);
       $electrodomestico->subcategorias()->create(["nombre"=>"Planchas","categoria_id"=>$electrodomestico->id]);

       $mueble->subcategorias()->create(["nombre"=>"Juego de sala","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Comedor","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Cama","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Base","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Ropero","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Escritorio","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Modular","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Encimera","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Solteron","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Peinadora","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Cajonera","categoria_id"=>$mueble->id]);
       $mueble->subcategorias()->create(["nombre"=>"Velador","categoria_id"=>$mueble->id]);

       $plastico->subcategorias()->create(["nombre"=>"Mesa infantil","categoria_id"=>$plastico->id]);
       $plastico->subcategorias()->create(["nombre"=>"Cajonera plastica","categoria_id"=>$plastico->id]);
       $plastico->subcategorias()->create(["nombre"=>"Silla infantil","categoria_id"=>$plastico->id]);


    }
}
