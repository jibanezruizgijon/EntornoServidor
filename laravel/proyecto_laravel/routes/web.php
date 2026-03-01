<?php

use App\Http\Controllers\CuadroController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

// Ruta para mostrar la vista de cuadros
Route::get('/galeria', [CuadroController::class, 'index'])->name('galeria.index');

require __DIR__.'/settings.php';
