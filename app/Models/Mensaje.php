<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    public $fillable=[
        "nombre",
        "email",
        "telefono",
        "asunto",
        "mensaje",
        "notificado",
        "hora",
        "horasFaltantes"
    ];

    public function mensaje()
    {
        return $this->hasOne(Cita::class);
    }
}
