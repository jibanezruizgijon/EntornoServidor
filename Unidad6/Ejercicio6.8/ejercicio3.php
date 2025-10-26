<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>

<body>
    <?php
    // Cuenta cuantas palabras tiene una frase introducida por el usuario
    // Tiene en cuenta los espacios del principio y del fin
    if (isset($_GET['frase'])) {
        $frase = trim($_GET['frase']);
        $arrayFrase = str_split($frase);
        $contador = 1;
        for ($i = 0; $i < count($arrayFrase); $i++) {
            if ($arrayFrase[$i] == ' ') {
                $contador++;
            }
        }
        echo "La frase " . $frase . " contiene " . $contador . " palabras";
    }
    ?>
    <form action="" method="get">
        <label>Introduce una frase</label>
        <input type="text" name="frase">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>