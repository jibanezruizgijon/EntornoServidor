<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    <table border="1px ">
        <?phP

        if (!isset($_REQUEST['ojo'])) {
            $numeroOjos = array_fill(0, 99, 0);
        } else {
            $ojo = isset($_GET['ojo']) ? $_GET['ojo'] : 0;
            $cadenaOjos = $_GET['cadenaOjos'];

            $numeroOjos = explode(",", $cadenaOjos);
            if ($numeroOjos[$ojo] == 0) {
                $numeroOjos[$ojo] = 1;
            } else {
                $numeroOjos[$ojo] = 0;
            }
        }

        $cadenaOjos = implode(",", $numeroOjos);
        $n = -1;
        for ($i = 0; $i < 10; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 10; $j++) {
                $n++;
                echo "<td";
                if ($numeroOjos[$n] == 1) {
                    $imagen = "img/abierto.png";
                } else {
                    $imagen = "img/cerrado.png";
                }
        ?>><a href="ejercicio1.php?ojo=<?= $n ?>&cadenaOjos= <?= $cadenaOjos ?>"><img src="<?= $imagen ?>"></a></td>
<?php    
            }
            echo "</tr>";
        }
?>
    </table>
</body>

</html>