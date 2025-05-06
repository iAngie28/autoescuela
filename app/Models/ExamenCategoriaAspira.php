<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExamenCategoriaAspira
 *
 * @property $id
 * @property $nombre
 * @property $costo
 * @property $nota_min_pract
 * @property $nota_min_teorica
 * @property $created_at
 * @property $updated_at
 *
 * @property ExamenSegip[] $examenSegips
 * @property Inscribe[] $inscribes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ExamenCategoriaAspira extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'examen_categoria_aspira';
    protected $fillable = ['nombre', 'costo', 'nota_min_pract', 'nota_min_teorica'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function examenSegips()
    {
        return $this->hasMany(\App\Models\ExamenSegip::class, 'id', 'id_categoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscribes()
    {
        return $this->hasMany(\App\Models\Inscribe::class, 'id', 'id_categoria');
    }
    
}
