<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $monto
 * @property $fecha
 * @property $descuento
 * @property $id_est
 * @property $id_adm
 * @property $created_at
 * @property $updated_at
 *
 * @property Usuario $usuario
 * @property Usuario $usuario
 * @property Inscribe[] $inscribes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['monto', 'fecha', 'descuento', 'id_est', 'id_adm'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_adm', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_est', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscribes()
    {
        return $this->hasMany(\App\Models\Inscribe::class, 'id', 'id_pago');
    }
    
}
