<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            width: 200px;
        }

        .registro {
            text-align: center;
            font-size: 2rem;
            padding: 17px;
        }
    </style>
</head>

<body>

    <table border="1px solid black">
        <tr>
            <td colspan="4" class="registro"><a href="../Controller/perfil.php"><?= $_SESSION['nombre'] ?></a></td>
        </tr>
        <tr>
            <th>Imagen</th>
            <th>Autor</th>
            <th>Likes</th>
            <th>Votar</th>
        </tr>
        <?php

        foreach ($data['fotos'] as $foto) {
        ?>
            <tr>
                <td><a href="../Controller/detalle.php?id=<?= $foto['id'] ?>"><img src="../View/imagen/<?= $foto['imagen'] ?>" alt="IMAGEN"></a></td>
                <td><?= $foto['nombre'] ?></td>
                <td><?= $foto['likes'] ?></td>
                <?php
                if (Like::getLikeById($foto['id'], $data['usuario']->getId())) {
                    echo "<td>Me gusta </td>";
                } else {
                ?>
                    <td><a href="../Controller/like.php?id_foto=<?= $foto['id'] ?>&id_usuario=<?= $data['usuario']->getId() ?>">Me gusta</a></td>
                <?php
                }
                ?>

            </tr>
        <?php
        }

        ?>
    </table>
</body>

</html>