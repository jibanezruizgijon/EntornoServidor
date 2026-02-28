@extends('layouts.app')
{{-- Cambia el título de la página --}}
@section('title', 'Página de Inicio')
    
@push('css')
    <style>
        body{
            background-color: rgb(167, 167, 167);
        }
    </style>
@endpush
    
{{-- Cambia el contenido de la página --}}
@section('content')
    <div class="max-w-4xl mx-auto p-4">
        <h1>Bienvenido al Proyecto Laravel</h1>
        <x-alert2 type="info" class="mb-10">
            <x-slot name="title">Titulo de la alerta </x-slot>
            Contenido de la alerta
        </x-alert2>
        <p>Hola mundo</p>
    </div>
@endsection
