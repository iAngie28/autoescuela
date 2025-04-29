<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    // Nombre de la tabla (opcional si sigue convención de nombres)
    protected $table = 'rol';

    // Constantes para los roles (como las que mostraste)
    const ADMINISTRADOR = 1;
    const INSTRUCTOR = 2;
    const USUARIO = 3;

    // Campos que se pueden llenar masivamente (importante para crear/actualizar)
    protected $fillable = [
        'nombre',
        'permisos'
    ];
}
