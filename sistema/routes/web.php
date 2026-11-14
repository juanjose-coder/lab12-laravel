<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación generadas por laravel/ui
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

// Rutas protegidas mediante GATE.
// Gate::authorize() lanza un error 403 si el usuario no tiene el permiso,
// así se evita entrar escribiendo la URL directamente en la barra de dirección.
Route::middleware('auth')->group(function () {

    Route::get('/mantenimiento', function () {
        Gate::authorize('mantenimiento'); // solo administrador
        return view('mantenimiento');
    })->name('mantenimiento');

    Route::get('/pedidos', function () {
        Gate::authorize('pedidos'); // solo cliente
        return view('pedidos');
    })->name('pedidos');
});
