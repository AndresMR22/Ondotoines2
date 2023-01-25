<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    use HasFactory;
    public $fillable=[
        "nombre",
        "precio"
    ];

    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class);
    }

    public function imagen()
    {
        return $this->morphOne(Imagen::class,'tipo');
    }

}
