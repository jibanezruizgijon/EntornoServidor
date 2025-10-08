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
        $contador = $_POST['contador'];
        $cadenaTexto = $_POST['cadenaTexto'] . " " . $_POST['n'];
    } else {
        $contador = 0;
        $cadenaTexto = "";
        
    }

    if ($contador == 6) {
        // PHP_INT_MAX   PHP_INT_MIN
        $max = 0;
        $min = 9999;
        $cadenaTexto = substr($cadenaTexto, 1);
        $cadenaNumero = explode(" ", $cadenaTexto);

        foreach ($cadenaNumero as $n) {
            if ($n < $min) {
                $min = $n;
            }
            if ($n > $max) {
                $max = $n;
            }
        }
        echo "Los números introducidos son: ";
        foreach ($cadenaNumero as $n) {
            if ($n === $max) {
                echo "máximo:",$n, " ";
            }
            if($n === $min){
                echo "mínimo:",$n, " ";
            }
            if ($n != $max && $n != $min) {
                echo $n, " ";
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