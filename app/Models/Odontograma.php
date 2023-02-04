<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
    use HasFactory;
    public $fillable=
    [
        "id",
        "observacion",
        "tratamiento_id"
    ];

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class);
    }

      // =========================== dieta_alimento_comida_dia
      public function cdps()
      {
          return $this->belongsToMany(CaraDienteProceso::class,'odontograma_cdp','odontograma_id','cdp_id')->withTimestamps();
      }

}
