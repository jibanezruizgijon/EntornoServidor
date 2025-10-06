<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio4</title>
</head>

<body>
  <?php
  // Se pregunta si se ha pulsado el boton llamar
 if (isset($_POST['llamar'])) {
    $bloque = $_POST['bloque'];
    $piso = $_POST['piso'];
  echo "<h3>Se ha llamdo al piso $piso del bloque $bloque</h3> ";
  }
  
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
                <td>
              <form method='post'>
                <input type='hidden' name='bloque' value='$i'>
                <input type='hidden' name='piso' value='$j'>
                <input type='submit' name='llamar' value='LLAMAR'>
              </form>
            </td>
                </tr>
                ";
      }
    }
    ?>
  </table>
</body>

</html>