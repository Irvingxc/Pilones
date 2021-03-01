<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilon extends Model
{
    use HasFactory;
//public $primaryKey = 'codigo_pilon';
    protected $fillable = [
        'codigo_pilon',
        'descripcion_pilon',
        'Fecha_datos_pilones',
        'ubicacion',
        'sucursal_id'
    ];
    protected $keyType = 'string';
}
