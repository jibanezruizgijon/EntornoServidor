<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio8</title>
</head>

<body>

    <?php
    // Se pide una palabra al usuario
    if (isset($_GET['palabra'])) {
        $palabra = trim($_GET['palabra']);
        $array = str_split($palabra);
        $codigo = [];
        $palabraDevuelta = [];

         // La palabra se pasa al codigo ascii caracter por caracter
        for ($i = 0; $i < count($array); $i++) {
            $codigo[] = ord($array[$i]);
        }
        echo "<h1>Palabra: $palabra</h1>";
        echo "<h2> Código ascii de la palabra:";
        foreach ($codigo as $numero) {
            echo $numero;
        }
        echo "</h2>";
        // Se calcula la palabra de vuelta a través del codigo ascii
        foreach ($codigo as $caracter) {
            $palabraDevuelta[] =  chr($caracter);
        }
        echo "<h2>Palabra desde código ascii:";
         foreach ($palabraDevuelta as $caracter) {
            echo $caracter;
        }
        echo "</h2>";
    }
    ?>
    <form action="" method="get">
        <label>Introduce una palabra</label>
        <input type="text" name="palabra">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>