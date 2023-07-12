<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Model
{

    use HasFactory, hasRoles;
    protected $guard_name = 'web';

    public $fillable=[
        "nombre",
        "apellido",
        "fecha_nac",
        "lugar_nac",
        "ocupacion",
        "direccion",
        "cedula",
        "telefono",
        "sexo",
        "observacion",
        "correo"
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class);
    }
    
    public function odontograma()
    {
        return $this->hasOne(Odontograma::class);
    }



}
