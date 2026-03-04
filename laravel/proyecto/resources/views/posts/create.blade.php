<x-app>
    @section('title', 'Página de creación de post')
    @section('content')
        <h1>Aquí crear un nuevo post</h1>


        <form action="{{ route('post.store') }}" method="post">
            @csrf
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"><br><br>

             @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}"><br><br>

             @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="content">Contenido:</label><br>
            <textarea id="content" name="content" rows="4" cols="50">{{ old('content') }}</textarea><br><br>
            
            <input type="submit" value="Crear Post">
        </form>

        {{-- @if ($errors->any())
            <div>
                <h2>Errores de validación:</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <br><br>
        <a href="/post">Volver</a>


    @endsection

</x-app>
