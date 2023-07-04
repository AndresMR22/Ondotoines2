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
    ];

    public function procedimientos()
    {
        return $this->belongsToMany(Procedimiento::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function odontograma()
    {
        return $this->hasOne(Odontograma::class);
    }


}
