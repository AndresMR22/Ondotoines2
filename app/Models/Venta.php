<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    public $fillable = [
        "cliente_id",
        "total",
        "tipo",
        
        "descuento"
    ];

    public function detalles_venta(){
        return $this->hasMany(VentaDetail::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
