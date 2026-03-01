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

// Ruta para mostrar el formulario de creación de un nuevo post
Route::get('/post/create', [PostController::class, 'create'])->name('create');

// Ruta para almacenar un nuevo post en la base de datos
Route::post('/post', [PostController::class, 'store'])->name('post.store');

// Ruta para mostrar un post específico
Route::get('/post/{id}', [PostController::class, 'show'])->name('post');

//Ruta para mostrar el formulario de edición de un post existente
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post');

// Ruta para actualizar un post existente en la base de datos
Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

//Ruta para eliminar un post existente de la base de datos
 Route::delete('/post/{id}', [PostController::class, 'destroy']);

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
    $posts = Post::all();
    return view('prueba', ['posts' => $posts]);
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



 require __DIR__.'/settings.php';
