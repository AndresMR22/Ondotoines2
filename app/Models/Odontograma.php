<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
    use HasFactory;
    public $fillable=
    [
        "observacion",
        "tratamiento_id"
    ];

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class);
    }

}
