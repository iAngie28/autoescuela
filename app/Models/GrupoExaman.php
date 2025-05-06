<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GrupoExaman
 *
 * @property $id
 * @property $estado
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $capacidad
 * @property $fecha_hora
 * @property $created_at
 * @property $updated_at
 *
 * @property ExamenSegip[] $examenSegips
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GrupoExaman extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['estado', 'fecha_inicio', 'fecha_fin', 'capacidad', 'fecha_hora'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examenSegips()
    {
        return $this->hasMany(\App\Models\ExamenSegip::class, 'id', 'id_grupo');
    }
    
}
