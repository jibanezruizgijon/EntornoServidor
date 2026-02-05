<?php
if (isset($_POST['cantidad'])) {
  $respuesta = "";
  $url = "http://localhost/EntornoServidor/Unidad12/Ejercicios12.7/Ejercicio2/servicio.php";

  $parametros = http_build_query([
    'cantidad' => $_POST['cantidad']
  ]);
  $json_recibido = @file_get_contents($url . "?" . $parametros);

  if ($json_recibido === false) {
    $error_msg = "Error: No se pudo conectar con el servicio web. Revisa la URL.";
    // Si hay cabeceras de respuesta, intentamos ver el código de error
    if (isset($http_response_header)) {
      $error_msg .= " Estado: " . $http_response_header[0];
    }
  } else {
    $respuesta = json_decode($json_recibido, true);
    if ($respuesta === null) {
      $error_msg = "Error: La respuesta del servidor no es un JSON válido. Recibido: " . htmlspecialchars($json_recibido);
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
  <h1>Obtener cartas de la baraja espñola</h1>

  <form action="" method="post">
    <label>Introduce el número de cartas</label>
    <input type="number" name="cantidad" min="1" max="40">
    <input type="submit" value="Enviar">
  </form>

  <?php
  if (isset($respuesta)) {
    echo "<h3>Cartas obtenidas:</h3>";
    echo "<ul>";
    foreach ($respuesta as $carta) {
      echo "<li> $carta </li>";
    }
    echo "</ul>";
  }
  ?>
</body>

</html>