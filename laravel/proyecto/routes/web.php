<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/create', [PostController::class, 'create'])->name('create');

// Ruta para crear un nuevo post
Route::get('/prueba', function() {
    $post = new Post;
    $post->title = 'tíTuLo de PrUeba 4';
    $post->content = 'Contenido de Prueba 4';
    $post->author = 'Autor de Prueba 4';
    $post->save();

    return view('prueba', ['post' => $post]);
})->name('prueba');

// Ruta para mostrar todos los posts
Route::get('/recoger', function() {
    $post = Post::all();
    return view('prueba', ['post' => $post]);
})->name('prueba');

// Ruta para mostrar un post específico
Route::get('/mostrar', function() {
    $post = Post::find(1);
    return view('mostrar', ['post' => $post]);
})->name('mostrar');

// Ruta para actualizar un post existente
Route::get('/actualizar', function() {
    // $post = Post::find(1); Para buscar por ID
    $post = Post::where('title', 'Título de Prueba 1')->first(); // Para buscar por título
    $post->title = 'Título de Prueba Actualizado';
    $post->content = 'Contenido de Prueba Actualizado';
    $post->author = 'Autor de Prueba Actualizado';
    $post->save();

    return view('prueba', ['post' => $post]);
})->name('actualizar');

Route::get('post/{post}', [PostController::class, 'show'])->name('post');

 require __DIR__.'/settings.php';
