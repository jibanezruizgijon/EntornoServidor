<?php
include_once "cubo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>crear Cubo</h1>

    <form action="" method="post">
        <label>Introduce la capacidad:</label>
        <input type="text" name="capacidad" required>
        <label>Introduce la cantidad:</label>
        <input type="number" name="cantidad">
        <input type="submit" value="Crear">
    </form>
    <?php

    if (isset($_POST['capacidad'])) {
        $capacidad = $_POST['capacidad'];
        if (empty($_POST['cantidad'])) {
            $cantidad = 0;
        } else {
            $cantidad = $_POST['cantidad'];
        }

        if ($cantidad > $capacidad) {
            echo "La cantidad no puede ser mayor que la capacidad";
        } else {
            $cubo1 = new cubo(10, $cantidad);
            echo $cubo1->getContenidoActual();

            $cubo2 = new cubo(10, $cantidad);
            echo $cubo1->getContenidoActual();

            $cubo1->verter(4, $cubo2);
        }
    }

    ?>
</body>

</html>