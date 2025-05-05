<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrador
 *
 * @property $id
 * @property $turno
 *
 * @property Usuario $usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Administrador extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'administrador';
    protected $fillable = ['turno'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'id', 'id');
    }
    
}
