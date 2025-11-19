<?php

if (isset($_POST['add'])) {
  move_uploaded_file($_FILES['archivo1']['tmp_name'], "ficheros/". $_FILES['archivo1']['name']);
  move_uploaded_file($_FILES['archivo2']['tmp_name'], "ficheros/". $_FILES['archivo2']['name']);
  // $archivo1 = $_FILES['archivo1']['tmp_name'];
  // $archivo2 = $_FILES['archivo2']['tmp_name'];
  $destino = $_POST['ubicacion'] . ".txt";
  $fp1 = fopen($_FILES['archivo1']['name'], "r");
  $fp2 = fopen($_FILES['archivo2']['name'], "r");
  $fpDestino = fopen($destino, "w");


  while (!feof($fp1) || !feof($fp2)) {

    if (!feof($fp1)) {
      $linea1 = fgets($fp1);
      if ($linea1 != false) {
        fwrite($fpDestino, $linea1 . PHP_EOL);
      }
      
    }

    if (!feof($fp2)) {
      if ($linea2 != false) {
      $linea2 = fgets($fp2);
      }

      fwrite($fpDestino, $linea2 . PHP_EOL);
    }
  }

  fclose($fp1);
  fclose($fp2);
  fclose($fpDestino);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio9</title>
</head>

<body>
  <h1>Mezclar dos archivos en uno</h1>
  <form enctype="multipart/form-data" action="" method="POST">
    <label>Ubicación</label>
    <input type="text" name="ubicacion" required>
    <br><br>
    <label>Recoge el primer archivo</label>
    <input type="file" name="archivo1" required>
    <br><br>
    <label>Recoge el segundo archivo</label>
    <input type="file" name="archivo2" required>
    <br><br>
    <input type="submit" name="add" value="Añadir">
  </form>
</body>

</html>