@extends('layouts.app')
{{-- Cambia el título de la página --}}
@section('title', 'Página de Prueba')

@section('content')
    <div class="max-w-4xl mx-auto p-4">
        <h1>Bienvenido a la Página de Prueba</h1>
        <p>Este es el contenido del post:</p>
        @foreach ($posts as $post)
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <h2 class="text-xl font-bold mb-2">{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <p class="text-sm text-gray-500">Autor: {{ $post->author }}</p>
                <p class="text-sm text-gray-500">Activo: {{ $post->is_active ? 'Sí' : 'No' }}</p>
            </div>
         @endforeach

    </div>
@endsection