<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    table {
      margin-left: auto;
      margin-right: auto;
    }

    img {
      width: 120px;
      display: block;
    }
  </style>
</head>

<body>
  <table border="1px ">
    <?php
    $ojo = isset($_GET['ojo']) ? $_GET["ojo"] : "";
    $cadenaOjos = isset($_GET['ojo']) ? $_GET['cadenaOjos'] : "";
  
    $cadenaOjos = substr($cadenaOjos, 1);
    //Separa la cadena en diferentes numeros separados por espacio
    $numeroOjos = explode(" ", $cadenaOjos);

    // Asi se eliminaría el numero del array mediante el indice
    //Otra forma podria ser con los pares e impares pero los numeros se acumularian
    if (in_array($ojo, $numeroOjos)) {
      $numeroOjos = array_diff($numeroOjos, [$ojo]);
    } else {
      $numeroOjos[] += $ojo; 
    }
    $cadenaOjos = implode(" ", $numeroOjos);
    echo "<tr>";
    for ($i = 1; $i <= 100; $i++) {
      echo "<td";
      if (in_array($i, $numeroOjos)) {
        $imagen = "img/abierto.png";
      } else{
        $imagen = "img/cerrado.png";
      }
    ?>><a href="Ejercicio1.php?ojo=<?= $i ?>&cadenaOjos= <?= $cadenaOjos?>"><img src="<?= $imagen ?>"></a></td>
  <?php
      if ($i % 10 == 0) {
        echo "</tr><tr>";
      }
    }
    echo "</tr>";
  ?>
  </table>
</body>

</html>