<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio10</title>
</head>

<body>
    <?php
    if (isset($_GET['nombre'])) {
        $palabra =  ucfirst(trim($_GET['nombre']));
        $array = str_split($palabra);

        // Comprueba que sea la primera letra después de un espacio y la hace mayúsculas
        for ($i = 1; $i < count($array); $i++) {
            if ($array[$i - 1] == ' ' && $array[$i] != ' ') {
                $array[$i] = strtoupper($array[$i]);
            }
        }
        echo "<h2>";
        foreach ($array as $letra) {
            echo $letra;
        }
        echo "</h2>";
        // Solo muestra las letras que vayan después de un espacio
        //Muestra las iniciales
        echo "<h2>";
        echo $array[0];
        for ($i = 1; $i < count($array); $i++) {
            if ($array[$i - 1] == ' ' && $array[$i] != ' ') {
                echo $array[$i];
            }
        }
        echo "</h2>";
    }

    ?>
    <form action="" method="get">
        <label>Introduce un nombre completo</label>
        <input type="text" name="nombre">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>