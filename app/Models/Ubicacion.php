<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_ubicacion',
        'descripcion_ubicacion',
        'estado_ubicacion',
        'procedencias_id'
    ];
    protected $keyType = 'string';
}
