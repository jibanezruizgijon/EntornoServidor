<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="2;ejercicio1.php">
    <style>
        body {
            text-align: center;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        img {
            width: 250px;
            display: block;
        }
    </style>
</head>

<body>
    <h2>Adivina la imagen</h2>

    <?php
    $num = $_GET['num'];
    $imagen = "";
    ?>
    <!-- Hace un if en cada <td> para comprobar si es esa celda la que se ha pulsado -->
      <!-- Según el if se mostrará el trozo de la imagen a descubrir o se quedará en gris -->
    <table>
        <tr>
            <td <?php
              $imagen = ($num ==1)? "img/vaca1.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
            <td<?php
              $imagen = ($num ==2)? "img/vaca2.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
            <td<?php
              $imagen = ($num ==3)? "img/vaca3.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
        </tr>
        <tr>
            <td<?php
              $imagen = ($num ==4)? "img/vaca4.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
            <td<?php
              $imagen = ($num ==5)? "img/vaca5.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
            <td<?php
              $imagen = ($num ==6)? "img/vaca6.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
        </tr>
        <tr>
            <td<?php
              $imagen = ($num ==7)? "img/vaca7.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
            <td<?php
              $imagen = ($num ==8)? "img/vaca8.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
            <td<?php
              $imagen = ($num ==9)? "img/vaca9.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen?>"></td>
        </tr>
    </table>
</body>

</html>