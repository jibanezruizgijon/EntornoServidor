@extends('layouts.app')
{{-- Cambia el título de la página --}}
@section('title', 'Página de Prueba')

@section('content')
    <div class="max-w-4xl mx-auto p-4">
        <h1>Bienvenido a la Página de Prueba</h1>
        <p>Este es el contenido del post:</p>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p><strong>Autor:</strong> {{ $post->author }}</p>

    </div>
@endsection