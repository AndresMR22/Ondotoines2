<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    public $fillable = [
        // "asunto",
        "observacion",
        // "especialidad",
        "medico",
        "paciente_id",
        "created_at"
    ];

    public function procedimientos()
    {
        return $this->belongsToMany(Procedimiento::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }




}
