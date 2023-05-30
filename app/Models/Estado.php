<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = [
        'empleado_peticion',
        'empleado_acepta',
        'fecha',
        'horario_solicitado',
        'horario_actual'
    ];
}
