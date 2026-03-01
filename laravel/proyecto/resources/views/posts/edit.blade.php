<x-app>
@section('content')
<h1>Editar Post</h1>
    <form action="/post/{{ $post->id }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}"><br><br>
        
        <label for="author">Autor:</label>
        <input type="text" id="author" name="author" value="{{ $post->author }}"><br><br>

        <label for="content">Contenido:</label><br>
        <textarea id="content" name="content" rows="4" cols="50">{{ $post->content }}</textarea><br><br>

        <input type="submit" value="Actualizar Post">
    </form>
@endsection
</x-app>