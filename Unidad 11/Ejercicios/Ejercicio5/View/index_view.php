<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
</head>

<body>
    <h1>Blog con articulos</h1>
    <a href="../Controller/nuevoArticulo.php">Nueva Artículo</a>
    <hr>
    <?php
    foreach ($data['articulos'] as $articulo) {
    ?>
        <h3><?= $articulo->getTitulo() ?></h3>
        <p><?= $articulo->getFecha() ?></p><br>
        <p><?= $articulo->getContenido() ?></p><br>
        <a href="../Controller/borraArticulo.php?= $articulo->getId() ?>">Borrar</a>
    <?php
    }
    ?>
</body>

</html>