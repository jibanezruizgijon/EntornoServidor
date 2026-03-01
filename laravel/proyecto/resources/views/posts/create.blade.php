<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto Post</title>
</head>

<body>
    <h1>Aquí crear un nuevo post</h1>
    <form action="/post" method="post">
        @csrf
        <label for="title">Título:</label>
        <input type="text" id="title" name="title"><br><br>
        
        <label for="author">Autor:</label>
        <input type="text" id="author" name="author"><br><br>

        <label for="content">Contenido:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Crear Post">
    </form>

    <a href="/post">Volver</a>
</body>

</html>
