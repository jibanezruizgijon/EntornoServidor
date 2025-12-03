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


    <?php
    if (count($_SESSION['cubos']) > 1) {
    ?>
        <hr>
        <h2>Verter Cubo</h2>
        <form action="" method="post">
            <label for="">Introduce el nombre del cubo que vierte(cubo1, cubo2...)</label>
            <select name="cubo1">
                <?php
                foreach ($_SESSION['cubos'] as $cubos => $datos) {
                    echo "<option value='$cubos'>$cubos</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="">Introduce el cubo a llenar</label>
            <select name="cubo2">
                <?php
                foreach ($_SESSION['cubos'] as $cubos => $datos) {
                    echo "<option value='$cubos'>$cubos</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="">Cantiad a verter:</label>
            <input type="number" name="cantidad" required>
            <br><br>
            <input type="submit" value="Verter">
        </form>
        <hr>
        <h2>Mostrar Cubo</h2>
        <form action="" method="post">
            <label>Mostrar Cantidad y Capacidad:</label>
            <select name="mostrarCubo">
                <?php
                foreach ($_SESSION['cubos'] as $cubos => $datos) {
                    echo "<option value='$cubos'>$cubos</option>";
                }
                ?>
            </select>
            <input type="submit" value="Mostrar">
        </form>
    <?php
    if (isset($_POST['mostrarCubo'])) {
      
         echo $_SESSION['cubos'][$_POST['mostrarCubo']];
       
    }
        if (isset($_POST['cubo1'])) {
            $cubo2 = $_SESSION['cubos'][$_POST['cubo2']];
            echo  $_SESSION['cubos'][$_POST['cubo1']]->verter($_POST['cantidad'], $cubo2);
        }
    }
    ?>
</body>

</html>