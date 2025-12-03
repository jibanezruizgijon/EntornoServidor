<?php
 if (session_status() == PHP_SESSION_NONE) session_start();

 if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [];
 }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>MASQUENOTAS</h1>
    <h2>Tus notas siempre accesibles en cualquier lugar</h2><br><br>
    <hr>

    <h3>Inicie sesión para acceder a su panel de notas</h3>
    <form action="principal.php" method="post">
        Usuario: <input type="text" name="username" value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>"><br>
        Contraseña: <input type="password" name="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>"><br>
        Recordar contraseña: <input type="checkbox" name="recordar"><br><br>
        <input type="submit" value="Iniciar sesión">
    </form><br><br>
    <hr>

    <h3>¿Todavía no tienes cuenta? Regístrate, es gratis</h3>
    <form action="registroLogin.php" method="post">
        <input type="submit" value="Registrarse">
    </form><br><br>
    <hr>

</body>

</html>