<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../View/css/index.css">
</head>

<body>
    <div class="container">
        
        <header>
            <h1>Blog con artículos</h1>
            <a href="../Controller/nuevoArticulo.php" class="btn btn__nuevo">Nuevo artículo</a>
        </header>

        <div class="articulos">
            <?php
            foreach ($data['articulos'] as $articulo) {
            ?>
                <article class="card">
                    <h3><?= $articulo->getTitulo() ?></h3>
                    
                    <p class="card__fecha"><?= $articulo->getFecha() ?></p>
                    
                    <p class="card__contenido">
                        <?=nl2br( $articulo->getContenido()) ?>
                    </p>
                    
                    <div class="card__botones">
                        <a href="../Controller/borraArticulo.php?id=<?= $articulo->getId() ?>" class="btn btn__borrar">Borrar</a>
                        <a href="../Controller/actualizaArticulo.php?id=<?= $articulo->getId() ?>" class="btn btn__modificar">Modificar</a>
                    </div>
                    
                </article>
            <?php
            }
            ?>
        </div> </div>
</body>

</html>