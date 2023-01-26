<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CaraDienteProceso extends Pivot
{
    protected $table = 'cara_diente_proceso';
    public $fillable = [
        'cara_id',
        'diente_id',
        'proceso_id',
    ];

    // ============== odontograma_cdp
    public function odontograma()
    {
        return $this->belongsToMany(Odontograma::class,'odontogramas','cdp_id','odontograma_id')->withTimestamps();
    }

}
