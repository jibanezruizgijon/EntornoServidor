<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>

<body>
    <?php
    $numero = [];
    $cuadrado = [];
    $cubo = [];

    for ($i = 0; $i < 20; $i++) {
        $numero[$i] = rand(0, 100);
    }

    foreach ($numero as  $value) {
        echo "$value - ";
    }
    foreach ($numero as $i => $value) {
        $cuadrado[$i] = $value * $value;
    }
    ?>
    <hr>
    <?php

    foreach ($cuadrado as  $value) {
        echo "$value - ";
    }
    ?>
    <hr>
    <?php
    foreach ($numero as $i => $value) {
        $cubo[$i] = $value * $value * $value;
    }

    foreach ($cubo as  $value) {
        echo "$value - ";
    }
    ?>
</body>

</html>