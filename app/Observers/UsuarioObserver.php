<?php

namespace App\Observers;

use App\Models\Usuario;
use App\Models\Administrador; // 👈 Añade esta importación
use App\Models\Rol;

class UsuarioObserver
{
    /**
     * Handle the Usuario "created" event.
     */
    public function created(Usuario $usuario): void
    {
        $rolAdministrador = Rol::where('nombre', 'administrador')->first();
    
    if ($usuario->rol == $rolAdministrador) {
        Administrador::create([
            'id' => $usuario->id,
            'turno' => 'mañana'
        ]);
    }
    }

    public function deleting(Usuario $usuario)
    {
        // Eliminar administrador si existe (la relación cascada ya lo hace)
        $usuario->administrador?->delete();
    }

    /**
     * Handle the Usuario "updated" event.
     */
    public function updated(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "deleted" event.
     */
    public function deleted(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "restored" event.
     */
    public function restored(Usuario $usuario): void
    {
        //
    }

    /**
     * Handle the Usuario "force deleted" event.
     */
    public function forceDeleted(Usuario $usuario): void
    {
        //
    }
}
