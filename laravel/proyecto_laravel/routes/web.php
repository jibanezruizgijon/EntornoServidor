<?php

use App\Http\Controllers\CuadroController;
use App\Http\Controllers\VotoController;
use App\Models\Cuadro;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cuadros.index', [CuadroController::class, 'index'])->name('home');
});

Route::resource('cuadros', CuadroController::class);

// Ruta para mostrar el ranking de cuadros de mejor a peor valorados
Route::get('/ranking', [CuadroController::class, 'ranking'])->name('ranking');


// Ruta para manejar el voto    
Route::post('/cuadros/{cuadro}/votar', [VotoController::class, 'store'])->name('votos.store');
//Route::get('/galeria', [CuadroController::class, 'index'])->name('galeria.index');

require __DIR__.'/settings.php';
