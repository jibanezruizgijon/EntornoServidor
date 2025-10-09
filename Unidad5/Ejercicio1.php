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

    // Se crean los 20 numeros random y se guardan en el array
    for ($i = 0; $i < 20; $i++) {
        $numero[$i] = rand(0, 100);
    }
    //Se muestra
    echo "normal:";
    foreach ($numero as  $value) {
        echo "$value - ";
    }
    // Se multiplica por el mismo valor 2 veces para dar el resultado al cuadrado
    foreach ($numero as $i => $value) {
        $cuadrado[$i] = $value * $value;
    }
    ?>
    <hr>
    <?php
    //Se muestra
    echo "cuadrado:";
    foreach ($cuadrado as  $value) {
        echo "$value - ";
    }
    ?>
    <hr>
    <?php
    echo "cubo:";
    // Se multiplica por el mismo valor 3 veces para dar el resultado al cubo
    foreach ($numero as $i => $value) {
        $cubo[$i] = $value * $value * $value;
    }
    //Se muestra
    foreach ($cubo as  $value) {
        echo "$value - ";
    }
    ?>
</body>

</html>