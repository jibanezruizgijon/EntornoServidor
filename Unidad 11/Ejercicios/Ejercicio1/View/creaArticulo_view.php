<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h1>Nuevo artículo</h1>
    <form action="../Controller/craArticulo.php" enctype="multipart/form-data" method="POST">
        <h3>Título</h3> <input type="text" size="40" name="titulo">
        <h3>Contenido</h3> <textarea name="contenido" cols="60" rows="6"> </textarea>
        <hr> <input type="submit" value="Aceptar">
    </form>
    <br>
    <a href="../Controller/index.php">Volver</a>
</body>

</html>