<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    use HasFactory;
    public $fillable=[
        "cuota",
        "saldo",
        "valor_frecuencia_pago",// si selecciona semana debe poner el numero de semanas, asi mismo con meses, quincenas, semestres, etc.
        "venta_id",
        "frecuencia_pago",//directo 0, semanal 1, quincenal 2, mensual 3, semestral 4, anual 5
        "cliente_id",
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


    public function abonos()
    {
        return $this->hasMany(Abono::class);
    }
}
