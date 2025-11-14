<?php
session_start();

// Inicia cuando se abre la página la primera vez
if (!isset($_SESSION['suma'])) {
    $_SESSION['suma'] = 0;
    $_SESSION['contador'] = 0;
}
if (isset($_REQUEST['num'])) {
    $num = $_POST['num'];

    //En caso de negativo se hace la media
    if ($num < 0) {
        $media = $_SESSION['suma'] / $_SESSION['contador'];
        echo "<h2>Media:" . $media . "</h2>";
        // En caso positivo se suma con el resto de números
        // Cuenta un número más para la media
    } else {
        $_SESSION['suma'] += $num;
        $_SESSION['contador']++;
    }
    echo "<h2>Contador:" . $_SESSION['contador'] . "</h2>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>

<body>
    <h3>Introduce un número negativo para terminar</h3>

    <form action="" method="post">
        <label>Introduce un número:</label>
        <input type="number" name="num">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>