<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return "Aquí se mostraran los posts";
    }

    public function create()
    {
        return "Aquí se mostrará el formulario para crear un nuevo post";
    }
    public function show($post)
    {
        return "Aquí se mostrará el post: {$post}";
    }
}
