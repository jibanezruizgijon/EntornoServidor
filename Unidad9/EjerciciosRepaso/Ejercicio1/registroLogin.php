<?php
include_once 'Funciones.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['user']) && $_REQUEST['password']) {
  if (!existeUsuario($_REQUEST['user'])) {
    agregarFichero($_REQUEST['user'], $_REQUEST['password']);
    header('Location: login.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Login</title>
  <style>
    .error{
      color: red;
    }
  </style>
</head>

<body>
  <form action="#" method="post">
    Usuario: <input type="text" name="user"><br>
    Contraseña: <input type="password" name="password"><br>
    <?php
      if (isset($_REQUEST['user']) && $_REQUEST['password']) {
        if (existeUsuario($_REQUEST['user'])) {
          echo '<span class="error">Ya existen estas credenciales</span><br>';
        }
      }
    ?>
    <input type="submit" value="Registrarse">
  </form>
</body>



</html>