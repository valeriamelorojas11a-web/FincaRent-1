<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

// Ruta principal (Login)
Route::get('/', function () {
    return view('login');
});

// Ruta del login
Route::get('/login', function () {
    return view('login');
});

// Ruta para el inicio
Route::get('/index', function () {
    return view('index');
})->name('index');

// Ruta para guardar reservas
Route::post('/reservas', [ReservaController::class, 'store'])
    ->name('reservas.store');

// Ruta para el panel principal
use App\Models\Reserva;

Route::get('/dashboard', function () {
    $reservas = Reserva::latest()->get();

    return view('Dashboard', compact('reservas'));
});
