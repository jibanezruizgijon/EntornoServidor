<?php

if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $archivo = "Usuarios.txt";

    $fp =  fopen($archivo, "a");
    fwrite($fp, $user . "," . $password . PHP_EOL);
    fclose($fp);
    header("Location: login.php");
    exit();
}

// Para pasar una fecha recogida a otro formato 
// date("d-m-Y", strtotime("$fecha + 1 days"));
// date coge una fecha y la pasa a string dandole  un formato
// strtotime pasa un string a fecha en entero
// time devuelve en entero la fecha actual 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>REGISTRO DE UNA NUEVA CUENTA DE USUARIO</h1>
    <h3>Introduzca los datos para registrar la cuenta</h3>
    <form action="" method="post">
        <label for="user">USUARIO:</label>
        <input type="text" name="user" required>
        <br><br>
        <label for="password">CONTRASEÑA:</label>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" value="ACEPTAR">
    </form>
</body>

</html>