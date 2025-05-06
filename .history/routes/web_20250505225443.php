<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\NotificacioneController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
