<?php

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
