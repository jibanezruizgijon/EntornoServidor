<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <style>
        img {
            width: 400px;
        }
    </style>
</head>

<body>
    <h1>Detalle de la imagen</h1>

    <img src="../View/imagen/<?= $data['foto']->getImagen() ?>" alt="imagen">

    <h2><span>Autor:</span> <?= $data['usuario']->getNombre() ?></h2>
    <hr>
    <h2>Usuarios que han dado like:</h2>

    <?php
   foreach ($data['nombresLike'] as $nombre) {
                echo "<li>" . $nombre . "</li>";
            }
    ?>

    <hr>
    <form action="../Controller/index2.php" method="post">
        <input type="submit" value="Página principal">
    </form>
</body>

</html>