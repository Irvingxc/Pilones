<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_dato_pilon extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'fecha_detalle',
        'temperatura',
        'virado',
        'mojado',
        'codigo_pilon',
        'pilon_id',
    ];
    use HasFactory;
} 
