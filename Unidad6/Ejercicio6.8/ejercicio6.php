<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>

<body>
    <?php
    // Dado un párrafo con dos frases (separadas por un punto)
    // Contar cuántas palabras tiene cada frase. 

    $parrafo = "Buenos dias, es hora de despertar. Buenas noches, es hora de dormir que se hace tarde";
    $punto = strpos($parrafo, ".");
    $frase1 =  substr($parrafo, 0, $punto);
    $frase2 = substr($parrafo, $punto + 1);

    $palabras1 = contarPalabras(trim($frase1));
    $palabras2 = contarPalabras(trim($frase2));
    echo "<h1>$parrafo</h1>";
    echo "<h2>$frase1</h2>";
    echo "<h2>La primera frase tiene $palabras1 palabras</h2>";
    echo "<h2>$frase2</h2>";
    echo "<h2>La segunda frase tiene $palabras2 palabras</h2>";

    function contarPalabras($frase)
    {
        $arrayFrase = str_split($frase);
        $contador = 1;
        for ($i = 0; $i < count($arrayFrase); $i++) {
            if ($arrayFrase[$i] == ' ') {
                $contador++;
            }
        }
        return $contador;
    }

    ?>
</body>

</html>