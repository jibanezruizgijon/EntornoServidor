<?php
session_start();
$compra = (isset($_POST['compra'])) ? $_POST['compra'] : " ";
$_SESSION['detalle'] = (isset($_POST['detalle'])) ? $_POST['detalle'] : $_SESSION['detalle'];

foreach ($_SESSION['productos'] as $productos => $datos) {
        if ($compra == $datos['nombre']) {
            $_SESSION['productos'][$productos]["unidades"]++;
            $_SESSION['total'] += $datos["precio"];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <style>
        * {
            font-family: sans-serif;
        }

        body {
            background-color: rgb(209, 232, 255);
            align-items: center;
            text-align: center;
        }
        p{
            margin-left: auto;
            margin-right: auto;
            max-width: 500px;
        }
    </style>
</head>

<body>
    <h2>Detalles del producto: <?= $_SESSION['detalle']  ?></h2>
    <?php

    foreach ($_SESSION['productos'] as $productos => $datos) {
        if ($_SESSION['detalle']  ==  $datos['nombre']) {
            echo "<img src=" . $datos["img"] . ">";
            echo "<h3>" . $datos["nombre"] .  "</h3>";
            echo "<p>". $datos["descripcion"] .  "</p>";
            echo "<h3> Precio:" . $datos["precio"] .  "€</h3>";
            
        }
    }
    ?>
    <form action="" method="post">
        <input type="hidden" name="compra" value="<?= $_SESSION['detalle'] ?>">
        <input type="submit" value="comprar">
    </form>
    <br>
    <form action="ejercicio6.php" method="post">
        <input type="submit" value="Volver">
    </form>
</body>

</html>