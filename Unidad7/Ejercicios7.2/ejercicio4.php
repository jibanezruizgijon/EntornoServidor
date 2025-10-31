<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: pagina_login.php");
}

if (isset($_POST['cerrar'])) {
    session_destroy();
    header("refresh: 0;");
}

if (isset($_REQUEST['num'])) {
    $_SESSION['num'] = $_POST['num'];
    // Inicia cunado se abre la página la primera vez
    $_SESSION['suma'] = isset($_SESSION['suma']) ?  $_SESSION['suma'] : 0;
    $_SESSION['contador'] = isset($_SESSION['contador']) ?  $_SESSION['contador'] : 0;
    //En caso de negativo se hacec la media
    if ($_SESSION['num'] < 0) {
        $media = $_SESSION['suma'] / $_SESSION['contador'];
        echo "<h2>Media:" . $media . "</h2>";
        // En caso positivo se suma con el resto de números
        // Cuenta un número más para la media
    } else {
        $_SESSION['suma'] += $_SESSION['num'];
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
    <title>Ejercicio4</title>
</head>

<body>
    <h3>Introduce un número negativo para terminar</h3>

    <form action="" method="post">
        <label>Introduce un número:</label>
        <input type="number" name="num">
        <input type="submit" value="Enviar">
    </form>
    <br>
    <form action="" method="post">
        <input type="hidden" name="cerrar">
        <input type="submit" value="Cerrar sesión">
    </form>
</body>

</html>