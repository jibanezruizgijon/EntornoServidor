<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>

<body>
    <?php
    // Intercambia un string dado, hasta volverlo a su forma original
    // Lo mueve carácter por carácter
    $palabraOriginal = "Biblioteca";
    $recuento =  strlen($palabraOriginal);
    $palabra = strtolower($palabraOriginal);
    echo "<h2>$palabra</h2>";
    for ($i = 0; $i < $recuento; $i++) {
        $ultima =  substr($palabra, -1);
        $palabra = $ultima . substr($palabra, 0, $recuento - 1);
        echo "<h2> $palabra</h2>";
    }
    ?>
</body>

</html>