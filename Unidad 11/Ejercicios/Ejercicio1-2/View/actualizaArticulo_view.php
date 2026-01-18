<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Actualizar artículo</title>
    <link rel="stylesheet" href="../View/css/actualizaArticulo.css">
</head>

<body>
    <div class="container">
        
        <form action="../Controller/updateArticulo.php" class="formulario" method="POST">
            <input type="hidden" name="id" value="<?= $data['articulo']->getId() ?>">
            
            <h3 class="label">Título</h3>
            
            <input type="text" class="titulo" name="titulo" value="<?= $data['articulo']->getTitulo() ?>">
            
            <h3 class="label">Contenido</h3>
            
            <textarea name="contenido" class="textarea" cols="60" rows="6"><?= $data['articulo']->getContenido() ?></textarea>
            
            <input type="submit" class="btn__enviar" value="Aceptar">
        </form>

        <a href="../Controller/index.php" class="btn__volver">Volver</a>
    </div>
</body>

</html>