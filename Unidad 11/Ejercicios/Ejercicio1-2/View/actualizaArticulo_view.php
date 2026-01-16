<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Actualizar artículo</title>
</head>

<body>
    <form action="../Controller/updateArticulo.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['articulo']->getId() ?>">
        <h3>Título</h3>
        <input type="text" size="40" name="titulo" value="<?= $data['articulo']->getTitulo() ?>">
        <h3>Contenido</h3>
        <textarea name="contenido" cols="60" rows="6"><?= $data['articulo']->getContenido() ?></textarea>
        <hr> <input type="submit" value="Aceptar">
    </form>
</body>

</html>