<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public $fillable = [
        "iva",
        "nombre",
        "direccion",
        "telefono",
        "telefono2",
        "correo",
    ];
}
