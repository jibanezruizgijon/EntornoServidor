<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio4</title>
</head>

<body>
  <?php
  echo 'Se ha llamdo al piso $piso '
  ?>
  <table border="1px">
    <thead>
      <th>Bloque</th>
      <th>Piso</th>
      <th>Llamar</th>
    </thead>
    <?php
    for ($i = 1; $i <= 3; $i++) {
      for ($j = 1; $j <= 7; $j++) {
        echo "<tr>
                <td>Bloque", $i, "</td>
                <td>Piso", $j, "</td>
                <td><input type= \"submit\" name=\"\" value=\"LLAMAR\"></td>
                </tr>
                ";
      }
    }
    ?>
  </table>
</body>

</html>