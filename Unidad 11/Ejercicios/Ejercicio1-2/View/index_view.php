<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <h1 class="">Blog con artículos</h1>
    <div><a href="../Controller/nuevoArticulo.php">Nuevo artículo</a></div>
    <hr>
    <?php
    foreach ($data['articulos'] as $articulo) {
    ?>
        <h3><?= $articulo->getTitulo() ?></h3>
        <p><?= $articulo->getFecha() ?></p>
        <p><?= $articulo->getContenido() ?></p><br>
        <div><a href="../Controller/borraArticulo.php?id=<?= $articulo->getId() ?>">Borrar</a></div>
        <div><a href="../Controller/actualizaArticulo.php?id=<?= $articulo->getId() ?>">Modificar</a></div>
    <?php
    }
    ?>
</body>

</html>