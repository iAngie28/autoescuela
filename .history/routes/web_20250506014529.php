<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ExamenCategoriaAspiraController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\NotificacioneController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('rols', RolController::class);
Route::resource('notificaciones', NotificacioneController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('administradors', AdministradorController::class);
Route::resource('estudiantes', EstudianteController::class);
Route::resource('instructors', InstructorController::class);
Route::resource('pagos', PagoController::class);
Route::resource('tipo-vehiculos', TipoVehiculoController::class);
Route::resource('vehiculos', VehiculoController::class);
Route::resource('examen-categoria-aspiras', ExamenCategoriaAspiraController::class);
Route::resource('paquetes', PaqueteController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
