<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odontograma_cdp extends Model
{
    use HasFactory;
    protected $table = 'odontograma_cdp';
    public $fillable=[
        "odontograma_id",
        "cdp_id",
    ];
}
