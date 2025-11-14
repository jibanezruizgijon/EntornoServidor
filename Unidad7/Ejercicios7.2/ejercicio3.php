<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>

<body>
    <h2>Introduce números hasta que su suma llegue a los 1000</h2>
    <?php
    // Se inician las variables
    if (!isset($_SESSION['suma'])) {
        $_SESSION['suma'] = 0;
        $_SESSION['contador'] = 0;
    }
    // Cuando recibe un número lo suma si no ha llegado a 1000
    if (isset($_REQUEST['num'])) {
        $num = $_GET['num'];
        if ($_SESSION['suma'] < 1000) {
            $_SESSION['contador']++;
            $_SESSION['suma'] += $num;
        }
        // Cuando llega a 1000 muestra los resultados
        if ($_SESSION['suma'] > 1000) { 
            echo "<h2>El valor total acumulado es " . $_SESSION['suma'] . "</h2>";
            echo "<h2>La cantidad de números introducidos es de " .  $_SESSION['contador'] . "</h2>";
            echo "<h2>La media es de " . $_SESSION['suma'] / $_SESSION['contador'] . "</h2>";
        }
    }
    // El formulario aparecerá mientras no supere los 1000
    if ($_SESSION['suma'] < 1000) {
    ?>
        <form action="" method="get">
            <label>Introduce un número:</label>
            <input type="number" name="num">
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>
</body>

</html>