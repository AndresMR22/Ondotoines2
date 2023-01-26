<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diente extends Model
{
    public $fillable=
    [
        "posicion",
    // "odontograma_id",
    ];

    // public function odontograma()
    // {
    //     return $this->belongsToMany(Odontograma::class);
    // }

    // public function caras()
    // {
    //     return $this->belongsToMany(Cara::class);
    // }

    // =========================== c d p 
    public function caras()
    {
        return $this->belongsToMany(Cara::class,'cara_diente_proceso')->withTimestamps()->withPivot('proceso_id');
    }

    public function procesos()
    {
        return $this->belongsToMany(Proceso::class,'cara_diente_proceso')->withTimestamps()->withPivot('cara_id');
    }
    //==========================================
}
