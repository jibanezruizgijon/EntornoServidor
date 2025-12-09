<?php
if (session_status() == PHP_SESSION_NONE) session_start();


if (isset($_POST['buscar'])) {
  $palabra = $_POST['buscar'];

  $fp = fopen("proyectos.txt", "r");

  while (!feof($fp)) {
    $linea = fgets($fp);
    if ($linea != "") {
      $array = explode(",", $linea);
      if (strpos($texto, $palabra) !== false) {
      }
    }
  }
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

<h1>Prueba</h1>
  <form action="index.php">
    <input type="submit" value="VOLVER">
  </form>
</body>

</html>