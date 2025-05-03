<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notificacione
 *
 * @property $id
 * @property $mensaje
 * @property $tipo
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property NotiEnviada[] $notiEnviadas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Notificacione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['mensaje', 'tipo', 'fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notiEnviadas()
    {
        return $this->hasMany(\App\Models\NotiEnviada::class, 'id', 'id_not');
    }
    
}
