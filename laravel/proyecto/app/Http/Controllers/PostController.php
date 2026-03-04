<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderby('created_at', 'desc')->paginate(12);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    // Request $request recoge los datos del formulario de creación de un nuevo post
    public function store(StorePostRequest $request)
    {

    // Validación de los datos del formulario utilizando las reglas definidas en StorePostRequest
        // $request->validate([
        //     'title' => 'required|min:5|max:150|unique:posts',
        //     'content' => 'required',
        //     'author' => ['required', 'max:100'],
        // ]);

        
    // Recoge todos los datos del formulario y los guarda en la base de datos
        Post::create($request->all());

        // $post =  new Post();
        // $post->title = $request->input('title');
        // $post->content = $request->input('content');
        // $post->author = $request->input('author');
        // $post->save();

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        // $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function show(Post $post)
    {
        // $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, Post $post)
    
    {

         $request->validate([
            'title' => "required|min:5|max:150|unique:posts,title,{$post->id}",
            'content' => 'required',
            'author' => ['required', 'max:100'],
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.min' => 'El título debe tener al menos :min caracteres.',
            'title.max' => 'El título no puede tener más de :max caracteres.',
            'title.unique' => 'El título ya existe. Por favor, elige otro.',
            'content.required' => 'El contenido es obligatorio.',
            'author.required' => 'El autor es obligatorio.',
            'author.max' => 'El autor no puede tener más de :max caracteres.',
        ]);


        // Recoge todos los datos del formulario y los actualiza en la base de datos
        $post->update($request->all());

        // Esta forma es mas larga 
        // $post = Post::find($id);
        // $post->title = $request->input('title');
        // $post->content = $request->input('content');
        // $post->author = $request->input('author');
        // $post->save();

        return redirect()->route('post', $post->id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post');
    }
}
