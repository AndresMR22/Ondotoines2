<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\AlertaEvent;

class Cita extends Model
{
    use HasFactory;
    public $fillable=[
        "fecha_inicio",
        "fecha_fin",
        "telefono",
        "medico",
        "estado",
        "especialidad",
        "paciente_id",
        "mensaje_id",
        "asunto"
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function mensaje()
    {
        return $this->belongsTo(Mensaje::class);
    }

    public static function make_order_notification($alerta){
        event(new AlertaEvent($alerta));
     }
}
