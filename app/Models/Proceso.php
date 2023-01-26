<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    public $fillable=
    [
        "nombre",
    ];

    // public function caras()
    // {
    //     return $this->hasMany(Cara::class);
    // }

    // =========================== c d p 
    public function caras()
    {
        return $this->belongsToMany(Cara::class,'cara_diente_proceso')->withTimestamps()->withPivot('diente_id');
    }

    public function dientes()
    {
        return $this->belongsToMany(Diente::class,'cara_diente_proceso')->withTimestamps()->withPivot('cara_id');
    }
    //==========================================

}
