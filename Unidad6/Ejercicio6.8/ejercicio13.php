<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio13</title>
</head>

<body>
    <?php
    if (isset($_GET['frase'])) {
        $palabra = trim($_GET['frase']);
        $array = str_split($palabra);
        $palabraMayor = 0;
        $contadorLetra = 0;
        $contadorA = 0;
        $palabrasA = 0;
        $inicial = '';
        $posibleInicial = '';
        
        //Recorre letra por letra 
        for($i = 0; $i < count($array); $i++) {
            if ($array[$i] != ' ' && $array[$i] != '.') {
                // recoge la posición de la primera letra de cada palabra
                if ($contadorLetra == 0) {
                    $posibleInicial = $i;
                }
                $contadorLetra++;
                // Cuenta las a mientras no haya espacio ni .
                if ($array[$i] === 'a') {
                    $contadorA++;
                }
            } else {
                // Comprueba que la palabra cumpla con las condiciones 
                if ($contadorLetra >= 8 && $contadorLetra <= 16 && $contadorA > 3 ) {
                    $palabrasA++;
                    $contadorA = 0;
                }
                // Comprueba la palabra más larga 
                if ($palabraMayor < $contadorLetra) {
                    $palabraMayor = $contadorLetra;
                    $inicial = $posibleInicial;
                }
                $contadorLetra = 0;
            }
        }
        //Comprueba la última palabra 
        if ($palabraMayor < $contadorLetra) {
            $palabraMayor = $contadorLetra;  
            $inicial = $posibleInicial;
        }
        echo "La posición inicial de la palabra más larga es $inicial y su longitud $palabraMayor";
        echo "<h2>Hay $palabrasA palabras que tengan entre 8 y 16 carácteres y que tengán más de 3 'a'</h2>";
    }
    ?>

    <form action="" method="get">
        <label>Introduce una frase acabada en punto:</label>
        <input type="text" name="frase">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>