<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public $fillable=[
        "codigo",
        "producto_id"
    ];
    
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function imagen(){
        return $this->morphOne(Imagen::class, 'tipo');
    }
}
