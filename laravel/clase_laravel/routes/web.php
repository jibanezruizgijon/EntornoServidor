<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

Route::get('/', function () {
    return view('welcome');
    return "<h1>Bienvenido a la aplicacic¡ón de laravel </h1>";
})->name('home');


Route::get('/home', HomeController::class)->name('home'); 

Route::get('/curso/{curso}', [CursoController::class, "show"])->name('cursos.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
