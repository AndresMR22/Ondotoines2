<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    public $fillable=[
        "fecha_inicio",
        "fecha_fin",
        "telefono",
        "medico",
        "estado",
        "especialidad",
        "paciente_id",
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
