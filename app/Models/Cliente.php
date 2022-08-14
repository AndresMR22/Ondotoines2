<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use HasFactory, hasRoles;
    protected $guard_name = 'web';

    public $fillable=[
        "nombre_completo",
        "cedula",
        "telefono",
        "ciudad",
        "canton",
        "direccion",
        "lugar_trabajo",
        "cargo",
    ];

    public function deudas()
    {
        return $this->hasMany(Deuda::class);
    }

    public function compras()
    {
        return $this->hasMany(Venta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
