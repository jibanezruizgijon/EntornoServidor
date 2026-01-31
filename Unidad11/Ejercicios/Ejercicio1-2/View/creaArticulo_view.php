<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear artículo</title>
    <link rel="stylesheet" href="../View/css/creaArticulo.css">
</head>

<body>
    <div class="container">
        <h1>Nuevo artículo</h1>
        <form action="../Controller/creaArticulo.php" enctype="multipart/form-data" class="formulario" method="POST">
            <h3 class="label">Título</h3> <input type="text" size="40" name="titulo" class="titulo">
            <h3 class="label">Contenido</h3> <textarea name="contenido" cols="60" rows="6" class="textarea"> </textarea>
            <input type="submit" class="btn__enviar" value="Aceptar">
        </form>
        <br>
        <a href="../Controller/index.php" class="btn__volver">Volver</a>
    </div>
</body>

</html>