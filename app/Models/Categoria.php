<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable=[
        "nombre"
    ];

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class)->withTrashed();
    }

    public function imagen()
    {
        return $this->morphOne(Imagen::class,'tipo');
    }
}
