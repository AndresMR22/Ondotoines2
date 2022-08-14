<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPrecio extends Model
{
    use HasFactory;
    public $fillable = [
        "precio_costo",
        "pvp",
        "descuento",
        "inicio_descuento",
        "fin_descuento",
        "producto_id",
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

}
