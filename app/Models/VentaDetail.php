<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetail extends Model
{
    use HasFactory;
    public $fillable = [
        "id",
        "cantidad",
        "precio",
        "producto_id",
        "venta_id",
    ];

    public function producto(){
        return $this->belongsTo("App\Models\Producto")->withTrashed();
    }
}
