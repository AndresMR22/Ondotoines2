<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class TablePermission extends Seeder
{
   
    public function run()
    {
         //CREACION DE LOS ROLES DEL SISTEMA
     Role::create(['name' => 'Administrador']);
    //  Role::create(['name' => 'Cliente']);
     
        $admin = User::create([
            "name"=>'Andres',
            "email"=>'gamr21@outlook.es',
            "password"=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'//morales98
        ]);


    $admin->assignRole('Administrador');
    // $cliente->assignRole('Cliente');

    }
}
