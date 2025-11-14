<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Acceso a la web</h2>
    <?php
    include_once("controlAcceso.php");
      $perfil = $_GET['perfil'];
      $fila = $_GET['fila'];
      $columna = $_GET['columna'];
      $valor = $_GET['valor'];
      $tarjeta = dameTarjeta($perfil);

      if (compruebaClave($tarjeta, $fila, $columna, $valor)) {
        echo "<h2>Acceso permitido</h2>";
      } else {
        echo "<a href='Ejercicio2.php'>volver a la página principal</a>";
      }
    ?>
</body>
</html>