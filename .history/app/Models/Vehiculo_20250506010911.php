<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 *
 * @property $placa
 * @property $modelo
 * @property $caracteristicas
 * @property $tipo
 * @property $created_at
 * @property $updated_at
 *
 * @property TipoVehiculo $tipoVehiculo
 * @property Clase[] $clases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vehiculo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'vehiculo';
    protected $fillable = ['placa', 'modelo', 'caracteristicas', 'tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoVehiculo()
    {
        return $this->belongsTo(\App\Models\TipoVehiculo::class, 'tipo', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases()
    {
        return $this->hasMany(\App\Models\Clase::class, 'placa', 'placa');
    }
    
}
