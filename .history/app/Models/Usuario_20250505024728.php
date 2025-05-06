<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\password;

/**
 * Class Usuario
 *
 * @property $id
 * @property $CI
 * @property $user
 * @property $NombreCompleto
 * @property $password
 * @property $sexo
 * @property $telefono
 * @property $direccion
 * @property $fch_reg
 * @property $id_rol
 * @property $created_at
 * @property $updated_at
 *
 * @property Rol $rol
 * @property Administrador $administrador
 * @property Estudiante $estudiante
 * @property Instructor $instructor
 * @property NotiEnviada[] $notiEnviadas
 * @property Pago[] $pagos
 * @property Pago[] $pagos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    protected $table = 'usuario'; // Nombre de la tabla
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CI', 'user', 'password', 'NombreCompleto', 'sexo', 'telefono', 'direccion', 'fch_reg', 'id_rol'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo(\App\Models\Rol::class, 'id_rol', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function administrador()
    {
        return $this->hasOne(\App\Models\Administrador::class, 'id');
    }
    protected static function booted()
    {
        // Crear perfil con valores por defecto al crear usuario
        static::created(function ($usuario) {
            if ($usuario->id_rol  == 1){
                $usuario->administrador()->create([
                    'id' => $usuario->id,
                    'turno' => 'mañana'
                ]);
            }
        });

        // Eliminar perfil al borrar usuario (opcional si ya tienes onDelete('cascade'))
        static::deleting(function ($usuario) {
            $usuario->administrador?->delete();
        });
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estudiante()
    {
        return $this->hasOne(\App\Models\Estudiante::class, 'id', 'id_est');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function instructor()
    {
        return $this->hasOne(\App\Models\Instructor::class, 'id', 'id_inst');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notiEnviadas()
    {
        return $this->hasMany(\App\Models\NotiEnviada::class, 'id', 'id_user');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagosAdministrador()
    {
        return $this->hasMany(\App\Models\Pago::class, 'id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagosEstudiante()
    {
        return $this->hasMany(\App\Models\Pago::class, 'id', 'id_est');
    }
    
}
