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
        <?php
        if (!isset($_REQUEST['ojo'])) {
            // Llena el array con 100 ceros en caso de que no se haya recogido la variable ojo
            $numeroOjos = array_fill(0, 100, 0);
        } else {
            // Recoge el ojo pulsado y la cadena con los 100 numeros
            $ojo = isset($_GET['ojo']) ? $_GET['ojo'] : 0;
            $cadenaOjos = $_GET['cadenaOjos'];

            // Convierte la cadena en números y el ojo pulsado cambia de número
            $numeroOjos = explode(",", $cadenaOjos);
            if ($numeroOjos[$ojo] == 0) {
                $numeroOjos[$ojo] = 1;
            } else {
                $numeroOjos[$ojo] = 0;
            }
        }

        // Muestra los ojos en una tabla 
        // Si el numero es 1  en la cadena de números el ojo está abierto
        // Si el número es 0 en la cadena de números el ojo está cerrado
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
        ?>><a href="ejercicio1.php?ojo=<?= $n ?>&cadenaOjos=<?=$cadenaOjos?>"><img src="<?= $imagen ?>"></a></td>
<?php    
            }
            echo "</tr>";
        }
?>
    </table>
</body>

</html>