<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto Post</title>
</head>
<body>
    <h1>Aquí se mostrará el post: {{ $post->id }}</h1>
    <h2><b>Título: </b>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <a href="{{ route('post.edit', $post->id) }}">Editar Post</a>
    <br><br>
    <a href="{{ route('post.index') }}">Volver</a>
    <br><br>
    <form action="{{ route('post.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Post</button>
    </form>
</body>
</html>