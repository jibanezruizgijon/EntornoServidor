<?php

include_once "Bombilla.php";
if (session_status() == PHP_SESSION_NONE) session_start();


if (!isset($_SESSION['bombillas'])) {
  $_SESSION['bombillas'] = [];
  $_SESSION['bombillas'][] = base64_encode(serialize(new Bombilla (1, 80, "Salon")));
}

if (isset($_POST['nombre'])) {
  $_SESSION['bombillas'][] = base64_encode(serialize(new Bombilla (1, $_POST['potencia'], $_POST['ubicacion'])));
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form action="" method="post">
    <label>Potencia</label>
    <input type="text" name="potencia" required>
    <br><br>
    <label>Ubicacion</label>
    <input type="text" name="ubicacion" required>
    <br><br>
    <label>Potencia</label>
    <input type="text" name="">
    <br><br>
    <input type="submit" value="Crear Bombilla">
  </form>



</body>

</html>