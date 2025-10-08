<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <meta http-equiv="refresh" content="2;ejercicio6.php">
  <style>
    body {
      text-align: center;
    }

    table {
      margin-left: auto;
      margin-right: auto;
       border-collapse: collapse;
    }

    img {
      width: 250px;
      display: block;
    }
  </style>
</head>

<body>
  <h2>Adivina la imagen</h2>

  <?php
  $num = $_GET['num'];
  $imagen = "";
  ?>
  <!-- Hace un if en cada <td> para comprobar si es esa celda la que se ha pulsado -->
  <!-- Según el if se mostrará el trozo de la imagen a descubrir o se quedará en gris -->
  <table>
    <?php
    $suma = 1;
    for ($i = 1; $i <= 3; $i++) {
    ?>
      <tr>
        <?php
          for ($j = 1; $j <= 3 ; $j++) { 
            ?>
            <td <?php
            $imagen = ($num == $suma) ? "img/vaca$suma.jpg" : "img/gris.jpg";
            ?>><img src="<?= $imagen ?>"></td>
            <?php
            $suma++;
          }  
        ?>
    <?php
    }
    ?>
  </table>
</body>

</html>