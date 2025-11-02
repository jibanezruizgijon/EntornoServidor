<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>

<body>
    <?php
// Inicia cunado se abre la página la primera vez
    if (!isset($_SESSION['suma'])) {
        $_SESSION['suma'] = 0;
        $_SESSION['contador'] = 0;
        $_SESSION['contadorImpar'] = 0;
        $_SESSION['parMayor'] = 0;
    }
    if (isset($_REQUEST['num'])) {
        $_SESSION['num'] = $_POST['num'];
        

        //En caso de negativo se hace la media
        if ($_SESSION['num'] >= 0) {
            // Suma solo los impares para la media
            // comprueba cuál es el mayor de los pares
            if ($_SESSION['num'] % 2 != 0) {
                $_SESSION['suma'] += $_SESSION['num'];
                $_SESSION['contadorImpar']++;
            } else {
                if ($_SESSION['num'] >  $_SESSION['parMayor']) {
                    $_SESSION['parMayor'] = $_SESSION['num'];
                }
            }
            $_SESSION['contador']++;
            // El formulario se mostrará mientras no se introduzca un número negativo
    ?>
            <h3>Introduce un número negativo para terminar</h3>
            <form action="" method="post">
                <label>Introduce un número:</label>
                <input type="number" name="num">
                <input type="submit" value="Enviar">
            </form>
        <?php
        // Cuando se introduzca un número negativo muestra los resultados
        } else {
            $media = $_SESSION['suma'] / $_SESSION['contadorImpar'];
            echo "<h2>Media de los impares:" . $media . "</h2>";
            echo "<h2>Números introducidos:" . $_SESSION['contador'] . "</h2>";
            echo "<h2>Número par más grande:" . $_SESSION['parMayor'] . "</h2>";
        }
    }
    // Solo se muestra la primer vez porque no hay parámetros introducidos
    if (!isset($_SESSION['num'])) {
        ?>
        <h3>Introduce un número negativo para terminar</h3>
        <form action="" method="post">
            <label>Introduce un número:</label>
            <input type="number" name="num">
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>
</body>

</html>