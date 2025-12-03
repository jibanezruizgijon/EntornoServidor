<?php

if (session_status() == PHP_SESSION_NONE) session_start();


if (!isset($_SESSION['usuarios'])) {
}

if (isset($_POST['user'])) {
    // Se recoge del formulario
    $user = trim($_POST['user']);
    $password = trim($_POST['password']);

    $archivo = "Usuarios.txt";

    $fp = fopen($archivo, "r");
    while (!feof($fp)) {
        $linea = fgets($fp);
        $array = explode(",", $linea);
        // Se recoger del fichero

        if ($linea != false) {
            $usuario = $array[0];

            $contraseña = $array[1];
        }


        if ($usuario == $user && $password == $contraseña) {
            fclose($fp);
            $_SESSION['user'] = $user;

            // Recorar si se pulsa el checbox
            if (isset($_POST['recordar'])) {
                $recordar = $_POST['recordar'];
                setcookie("password", $password, time() + 30 + 24 + 60 + 60);
                setcookie("user", $user, time() + 30 + 24 + 60 + 60);
            } else {
                setcookie("password", "", -1);
                setcookie("user",  "", -1);
            }
            header("Location: principal.php");
            exit();
        }
    }

    fclose($fp);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Masquenotas</h1>
    <h2>Tus notas siempre accesibles en cualquier lugar</h2>
    <hr>

    <div class="container">
        <h3>Inicie sesión para acceder a su panel de notas</h3>
        <form action="" method="post">
            <label for="user">USUARIO:</label>
            <input type="text" name="user" <?php
                                            if (isset($_COOKIE['user'])) {
                                            ?>
                value="<?= $_COOKIE['user'] ?>"
                <?php
                                            }
                ?> required>
            <br><br>
            <label for="password">CONTRASEÑA:</label>
            <input type="password" name="password" <?php
                                                    if (isset($_COOKIE['password'])) {
                                                    ?>
                value="<?= $_COOKIE['password'] ?>"
                <?php
                                                    }
                ?> required>
            <br><br>
            <label for="recordar">Recordar contraseña</label>
            <input type="checkbox" name="recordar">
            <br><br>
            <input type="submit" value="ACEPTAR">
        </form>
        <?php
        if (isset($_POST['user'])) {
        ?>
            <h2 style="color: red;">Usuario o contraseñas incorrectos!!!</h2>
        <?php
        }
        ?>

    </div>
    <hr>
    <h3>¿Todavía no tienes cuenta? Regístrate, es gratis</h3>
    <form action="registrar.php" method="post">
        <input type="submit" name="registrar" value="REGISTRAR">
    </form>
</body>

</html>