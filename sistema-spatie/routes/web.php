<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

// ---------- Actividad 3: notas y permiso destroy_notes ----------
Route::middleware('auth')->group(function () {
    Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
});

// Ruta protegida: sin el permiso destroy_notes el usuario recibe error 403
Route::middleware(['auth', 'permission:destroy_notes'])->group(function () {
    Route::delete('/notes/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');
});

// ---------- Guía Spatie: roles cliente / empleado ----------
// Solo los usuarios con rol "cliente" entran a este grupo de rutas
Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/tienda/cliente', function () {
        return 'Zona exclusiva para clientes registrados';
    })->name('tienda.cliente');
});

// Vista que muestra contenido según rol y permiso
Route::get('/tienda', function () {
    return view('tienda');
})->middleware('auth')->name('tienda');
