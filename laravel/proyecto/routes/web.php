<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post/create', [PostController::class, 'create'])->name('create');


Route::get('post/{post}', [PostController::class, 'show'])->name('post');

 require __DIR__.'/settings.php';
