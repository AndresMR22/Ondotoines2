<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cara extends Model
{
    use HasFactory;

    public $fillable=
    [
        "nombre",
        // "diente_id",
        // "proceso_id"
    ];

    // public function dientes()
    // {
    //     return $this->belongsToMany(Diente::class);
    // }

    // public function proceso()
    // {
    //     return $this->belongsTo(Proceso::class);
    // }

    // =========================== c d p 
    public function dientes()
    {
        return $this->belongsToMany(Diente::class,'cara_diente_proceso')->withTimestamps()->withPivot('proceso_id');
    }

    public function procesos()
    {
        return $this->belongsToMany(Proceso::class,'cara_diente_proceso')->withTimestamps()->withPivot('diente_id');
    }
    //==========================================
}
