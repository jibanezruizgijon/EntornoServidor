<?php

use App\Http\Controllers\CuadroController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');


Route::middleware(['auth', 'verified'])->group(function () {
    // Tu ruta actual de la galería
    Route::get('/galeria', [CuadroController::class, 'index'])->name('home');

    // NUEVA RUTA: Para eliminar un cuadro (Fíjate que usa Route::delete)
    Route::delete('/cuadros/{cuadro}', [CuadroController::class, 'destroy'])->name('cuadros.destroy');

    // Tu ruta temporal del admin
    Route::get('/admin', function () {
        return "<h1>Panel de Administrador en construcción...</h1>";
    })->name('admin.panel');
});
// Ruta para mostrar la vista de cuadros
//Route::get('/galeria', [CuadroController::class, 'index'])->name('galeria.index');

require __DIR__.'/settings.php';
