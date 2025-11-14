<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio11</title>
</head>

<body>
    <?php
    $valores = ["M", "D", "C", "L", "X", "I"];
    if (isset($_GET['nromanos'])) {
        $nromanos = strtoupper(trim($_GET['nromanos'])) ;
        $array = str_split ($nromanos);
        $compruebaNumero = true;
        $suma = 0;
        // Comprueba que los números romanos sean los correctos
        for ($i=0; $i < count($array); $i++) { 
            if ( !in_array($array[$i], $valores)) {
                 $compruebaNumero = false;
            } else {
                // Suma según el número romano en cada posicion del  array
                $suma += ($array[$i] == "M")? +1000 : +0;
                $suma += ($array[$i] == "D")? +500 : +0;
                $suma += ($array[$i] == "C")? +100 : +0;
                $suma += ($array[$i] == "L")? +50 : +0;
                $suma += ($array[$i] == "X")? +10 : +0;
                $suma += ($array[$i] == "I")? +1 : +0;
            }
        } 
        if ($compruebaNumero == false) {
            echo "<h2>Introduce bien los números romanos</h2>";
        } else {
            echo "<h2>Números romanos bien introducidos</h2>";
            echo "El valor de '$nromanos' es de: $suma";
        }
    }
    ?>
    <form action="" method="get">
        <label>Introduce números romanos</label>
        <input type="text" name="nromanos">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>