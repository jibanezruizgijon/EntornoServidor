<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
</head>

<body>
    <h1>Blog con artículos</h1>
    <a href="../Controller/nuevoArticulo.php">Nuevo artículo</a>
    <hr>
    <?php
    foreach ($data['articulos'] as $articulo) {
    ?>
        <h3><?= $articulo->getTitulo() ?></h3>
        <p><?= $articulo->getFecha() ?></p>
        <p><?= $articulo->getContenido() ?></p><br>
        <a href="../Controller/borraArticulo.php?id=<?= $articulo->getId() ?>">Borrar</a>
    <?php
    }
    ?>
</body>

</html>