<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>

    <style>
        table {
            margin-left: auto;
            margin-right: auto;
        }

        img {
            width: 120px;
            display: block;
        }
    </style>
</head>

<body>
    <table border="1px">
        <?php
        $fila = isset($_GET['fila']) ? $_GET["fila"] : 0;
        $columna = isset($_GET['columna']) ? $_GET["columna"] : 0;
        for ($i = 1; $i <= 10; $i++) {

        ?>
            <tr>
                <?php
                for ($j = 1; $j <= 10; $j++) {
                ?>

                    <td <?php
                        if ($fila == $i && $columna == $j) {
                            $imagen = "img/abierto.png";
                        } else {
                            $imagen = "img/cerrado.png";
                        }
                        ?>><a href="ejercicio5.php?fila=<?= $i ?>&columna=<?= $j ?>"><img src="<?= $imagen ?>"></a></td>
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