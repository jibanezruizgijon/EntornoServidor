<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control de Acceso</title>
</head>

<body>

  <h1>Control de acceso a una web</h1>
  <?php
  include_once("controlAcceso.php");
  $columnas = ["A", "B", "C", "D", "E"];
  $fila = rand(1, 5);
  $indice = array_rand($columnas);
  $columna = $columnas[rand(0, 4)];

  echo "<table border='1' style='border-collapse: collapse'>";
  echo "<tr><th>Tarjeta Admin</th><th>Tarjeta Usuario</th></tr>";
  echo "<tr><td>";
  imprimeTarjeta(dameTarjeta('admin'));
  echo "</td><td>";
  imprimeTarjeta(dameTarjeta('usuario'));
  echo "</td></tr>";
  echo "</table>";


  ?>
  <form action="" method="get">
    <label>¿Cuál es tu perfil?</label>
    Usuario<input type="radio" name="opcion" value="estandar">
    Administrador<input type="radio" name="opcion" value="admin">
    <br><br>
    <label> Introduce la clave de la fila <?= $fila ?> y la columna <?= $columna ?>:</label>
    <input type="number" name="clave">
    <input type="submit" value="Comprobar">
  </form>
</body>

</html>