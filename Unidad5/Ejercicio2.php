<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>

<body>
    <?php
    if (isset($_POST['n'])) {
        //Recoge el contador y agrupa el ultimo numero a los anteriores
        $contador = $_POST['contador'];
        $cadenaTexto = $_POST['cadenaTexto'] . " " . $_POST['n'];
    } else {
        $contador = 0;
        $cadenaTexto = "";
    }

    if ($contador == 6) {
        $max = 0;
        $min = 9999;
        //Elimina el primer espacio
        $cadenaTexto = substr($cadenaTexto, 1);
        //Separa la cadena en diferentes numeros separados por espaco
        $cadenaNumero = explode(" ", $cadenaTexto);

        // Comprueba cual es el máximo y cual el minimo
        foreach ($cadenaNumero as $n) {
            if ($n < $min) {
                $min = $n;
            }
            if ($n > $max) {
                $max = $n;
            }
        }
        echo "Los números introducidos son: <br>";
        foreach ($cadenaNumero as $n) {
            if ($n === $max) {
                echo "máximo:", $n, "<br> ";
            }
            if ($n === $min) {
                echo "mínimo:", $n, " <br>";
            }
            if ($n != $max && $n != $min) {
                echo $n, " <br>";
            }
        }
    } else {
    ?>
        <form action="" method="post">
            <label for="">Introduce 10 números </label>
            <input type="number" name="n" autofocus>
            <input type="hidden" name="contador" value="<?= ++$contador ?> ">
            <input type="hidden" name="cadenaTexto" value="<?= $cadenaTexto ?>">
            <input type="hidden" name="maximo" value="<?= $max ?>">
            <input type="hidden" name="minimo" value="<?= $min ?>">
            <input type="submit" value="enviar">
        </form>
    <?php
    }
    ?>
</body>

</html>