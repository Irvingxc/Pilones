<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_pilon extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_variedad',
        'codigo_clase',
        'codigo_finca'
    ];
}
