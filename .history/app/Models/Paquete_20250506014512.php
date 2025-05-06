<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paquete
 *
 * @property $id
 * @property $cant_class
 * @property $capacidad_est
 * @property $costo
 * @property $created_at
 * @property $updated_at
 *
 * @property Clase[] $clases
 * @property Inscribe[] $inscribes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paquete extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['cant_class', 'capacidad_est', 'costo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases()
    {
        return $this->hasMany(\App\Models\Clase::class, 'id', 'id_paquete');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscribes()
    {
        return $this->hasMany(\App\Models\Inscribe::class, 'id', 'id_paquete');
    }
    
}
