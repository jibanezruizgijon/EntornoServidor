<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: ejercicio4.php");
}

if (isset($_POST['usuario'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['password'] = $_POST['password'];

    header("Location: ejercicio4.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página login</title>
</head>

<body>

    <h2>Regístrate</h2>
    <form action="" method="post">
        <label>Introduce el nombre de usuario</label>
        <input type="text" name="usuario" required>
        <br><br>
        <label>Introduce la contraseña</label>
        <input type="password" name="password" required>
        <br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>

</html>