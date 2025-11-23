<?php
include_once "cubo.php";
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['cubos'])) {
    $_SESSION['cubos'] = [];
}



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
        <input type="number" name="capacidad" required>
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
            $_SESSION['cubos']["cubo" . (count($_SESSION['cubos']) + 1)] = new cubo($capacidad, $cantidad);
            print_r($_SESSION['cubos']);
        }
    }
    ?>

    <hr>
    <?php
    if (count($_SESSION['cubos']) > 1) {
    ?>
        <form action="" method="post">
            <label for="">Introduce el nombre del cubo que vierte(cubo1, cubo2...)</label>
            <input type="text" name="cubo1" required>
            <br><br>
            <label for="">Introduce el cubo a llenar</label>
            <input type="text" name="cubo2" required>
            <br><br>
            <label for="">Cantiad a verter:</label>
            <input type="number" name="cantidad" required>
            <br><br>
            <input type="submit" value="Verter">
        </form>
    <?php
        if (isset($_POST['cubo1'])) {
            $cubo2 = $_SESSION['cubos'][$_POST['cubo2']];
            echo  $_SESSION['cubos'][$_POST['cubo1']]->verter($_POST['cantidad'], $cubo2);
        }
    }
    ?>
</body>

</html>