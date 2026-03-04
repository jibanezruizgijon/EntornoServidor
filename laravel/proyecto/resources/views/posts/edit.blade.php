<x-app>
    @section('content')
        <h1>Editar Post</h1>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('PUT')
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="title">Título:</label>
            {{-- El valor old() recoge el valor anteriormente introducido en el formulario si hay errores de validación o muestra valor por defecto del post --}}
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"><br><br>

            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" value="{{ old('author', $post->author) }}"><br><br>

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="content">Contenido:</label><br>
            <textarea id="content" name="content" rows="4" cols="50">{{ old('content', $post->content) }}</textarea><br><br>

            <input type="submit" value="Actualizar Post">
        </form>
    @endsection
</x-app>
