<?php
if (session_status() == PHP_SESSION_NONE) session_start();
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

        form {
            margin-top: 5rem;
        }
    </style>
</head>

<body>
    <form action="inicio.php" method="post">
        Introduce tu correo: <input type="email" name="correo" required><br>
        Introduce tu contraseña: <input type="password" name="contraseña" required><br>
        <input type="submit" value="Entrar">
    </form><br><br>
    <a href="clasificacion.php">Ver clasificación</a>
</body>

</html>