<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Odontograma_cdp extends Pivot
{
    use HasFactory;
    protected $table = 'odontograma_cdp';
    public $fillable=[
        "odontograma_id",
        "cdp_id",
    ];
}
