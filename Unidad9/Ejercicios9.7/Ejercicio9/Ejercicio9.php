<?php

include_once "CocheLujo.php";
  if (session_status() == PHP_SESSION_NONE) session_start();
   
  if (!isset($_SESSION['coches'])) {
    $_SESSION['coches'] = [];
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
    <label for="">Matrícula</label>
    <input type="text" name="matricula">
    <br><br>
    <label for="">Modelo</label>
    <input type="text" name="modelo" id="">
    <br><br>
    <label for="">Precio</label>
    <input type="number" name="precio" id="">
    <br><br>
    <label for="">Suplemeto de lujo</label>
    <input type="number" name="" id="">
    <br><br>
</form>



<?php
  foreach ($_SESSION['coches'] as $coche) {
    $coche = unserialize($coche);
   echo "<tr>".$coche;
   if (get_class($coche) == "Coche") {
    echo "<td> No procede </td>";
   }
  }  
?>
</body>
</html>