<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio12</title>
</head>

<body>
    <?php
    $vocales = ['a', 'e', 'i', 'o', 'u', ' '];
    $contador = [0, 0, 0, 0, 0, 0];
    if (isset($_GET['frase'])) {
        $frase =  trim($_GET['frase']);
        $array =  str_split($frase);
        $palabrasLargas = 0;
        $cuentaLetras = 0;
        // Comprueba con cada letra la cantidad de veces que se repite una letra
        // almacena la cantidad de cada letra en otro array
        for ($i = 0; $i < count($vocales); $i++) {
            for ($j = 0; $j < count($array); $j++) {
                if ($vocales[$i] == $array[$j]) {
                    $contador[$i]++;
                }
            }
        }
        // Comprueba cuantas palabras tienen más de 10 letras 
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] != ' ') {
                $cuentaLetras++;
            } else {
                if ($cuentaLetras > 10) {
                    $palabrasLargas++;
                }
                $cuentaLetras = 0;
            }
        }
        //Comprueba la última palabra 
        if ($cuentaLetras > 10) {
            $palabrasLargas++;
        }
        echo "<h2>La cantidad de veces que sale cada letra y el espacio</h2>";
        echo "<h3>$frase</h3>";
        for ($i = 0; $i < count($vocales) - 1; $i++) {
            echo "<br>La letra $vocales[$i] se repite: " . $contador[$i];
        }
        echo "<br>El espacio de palabras se repite: " . $contador[count($vocales) - 1];
        echo "<br>La cantidad de palabras con más de 10 letras es: " . $palabrasLargas;
    }
    ?>

    <form action="" method="get">
        <label>Introduce una frase acabada en punto:</label>
        <input type="text" name="frase">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>