<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_COOKIE["paleta"]) && !isset($_SESSION['paleta'])) {

  $_SESSION['paleta'] = unserialize(base64_decode($_COOKIE["paleta"]));
}

if (!isset($_SESSION['paleta'])) {
  $_SESSION['paleta'] = [];
}

if (isset($_POST['add'])) {
  $R = rand(0, 255);
  $G = rand(0, 255);
  $B = rand(0, 255);

  $color = "$R, $G, $B";
  $_SESSION['paleta'][] = $color;
  $paletaTxt = base64_encode(serialize($_SESSION['paleta']));
  setcookie("paleta", $paletaTxt, time() + 24 * 60 * 60);
}

if (isset($_POST['borrar'])) {
  setcookie("paleta", "", -1);
  session_destroy();
  header("refresh: 0;");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir color</title>
</head>

<style>
  input {
    margin: 20px;
    padding: 10px;
  }

  body {
    background-color: rgb(<?= $color ?>);
  }
</style>

<body>

  <form action="" method="post">
    <input type="submit" name="add" value="Añadir color">
  </form>
  <br><br>
  <form action="Ejercicio1.1.php" method="post">
    <input type="submit" value="Mostrar paleta creada">
  </form>
</body>

</html>