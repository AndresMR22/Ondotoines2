<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;

    public $fillable=[
        "valor",
        "deuda_id"
    ];

    public function imagen(){
        return $this->morphOne(Imagen::class, 'tipo');
    }

    public function deuda()
    {
        return $this->belongsTo(Deuda::class);
    }
}
