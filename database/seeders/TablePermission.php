<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class TablePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //CREACION DE LOS ROLES DEL SISTEMA
     Role::create(['name' => 'Administrador']);
     Role::create(['name' => 'Cliente']);
     
        $admin = User::create([
            "name"=>'Andres',
            "email"=>'gamr21@outlook.es',
            "password"=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'
        ]);


        

        $user = User::create([
            "name"=>'Pablo',
            "email"=>'pablo@gmail.com',
            "password"=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'
        ]);
        $cliente = $user->cliente()->create([
            "nombre_completo"=>"Pablo Torres",
            "cedula"=>"2100463187",
            "telefono"=>"0988703044",
            "ciudad"=>"Santo Domingo",
            "canton"=>"La Concordia",
            "direccion"=>"Av. Simon Plata Torres",
            "lugar_trabajo"=>"PIKA",
            "cargo"=>"cobrador"
        ]);

    $admin->assignRole('Administrador');
    $cliente->assignRole('Cliente');

    }
}
