<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Textura extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigo_textura';
    protected $fillable = [
        'codigo_textura',
        'nombre_textura',
        'descripcion_textura',
    ];
    protected $keyType = 'string';
}
