<?php

use App\Http\Controllers\CuadroController;
use App\Http\Controllers\VotoController;
use App\Models\Cuadro;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');


Route::middleware(['auth', 'verified'])->group(function () {
    // Tu ruta actual de la galería
    Route::get('/cuadros.index', [CuadroController::class, 'index'])->name('home');
});

Route::resource('cuadros', CuadroController::class);
// Ruta para mostrar la vista de cuadros

Route::get('/prueba', function () {
    Cuadro::create([
        'nombre' => 'PRUEBAAAA',
        'autor' => 'Leonardo da Vinci',
        'epocaPintura' => 'Renacimiento',
        'urlImg' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/800px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg',
    ]);
    return 'Cuadro de prueba creado';
});
Route::get('/ranking', function () {
    return view('ranking');
})->name('ranking');
// Ruta para manejar el voto
Route::post('/voto', [VotoController::class, 'store'])->name('voto.store');
//Route::get('/galeria', [CuadroController::class, 'index'])->name('galeria.index');

require __DIR__.'/settings.php';
