<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio11</title>
</head>

<body>
  <?php

  // Si es la primera vez que se abre la página crea el diccionario
  if (!isset($_POST['diccionario'])) {
    $diccionario  = [
      "tree" => "árbol",
      "friend" => "amigo",
      "moon" => "luna",
      "rain" =>  "lluvia",
      "dream" => "sueño",
      "work" => "trabajo",
      "sun" => "sol",
      "rain" => "lluvia",
      "night" => "noche",
      "book" => "libro",
      "flower" => "flor",
      "shoe" => "zapato",
      "sky" => "cielo",
      "money" => "dinero,",
      "forest" => "bosque",
      "star" => "estrella",
      "door" => "puerta",
      "fish" => "pez",
      "window" => "ventana",
      "beach" => "playa",
      "pencil" => "lapiz",
      "dog" => "perro"
    ];
  } else {
    //Recuperar el diccionario
    $diccionario = unserialize(base64_decode($_POST['diccionario']));
  }

  //Cuando se envie una palabra
  if (isset($_POST['palabra'])) {
    $palabra = $_POST['palabra'];
    $encontrada = false;

    //En caso de añadir una palabra nueva
    if (isset($_POST['clave']) && isset($_POST['valor'])) {
      $clave = $_POST['clave'];
      $valor = $_POST['valor'];
      $diccionario[$clave] = $valor;
      echo `palabra $valor añadida al diccionario`;
    }
    //envia la traducción
    foreach ($diccionario as $key => $value) {
      if ($palabra === $value) {
        echo "La palabra $value en inglés es: $key";
        $encontrada = true;
      }
    }
    if (!$encontrada) {
      echo "La palabra $palabra no se ha encontrado en el diccionario";
  ?>
      <hr>

      <h3>Añadir una palabra al diccionario</h3>
      <form action="" method="post">
        <input type="hidden" name="diccionario" value="<?= base64_encode(serialize($diccionario)) ?>">
        <input type="hidden" name="palabra" value="<?= $palabra ?>">
        <label for="clave">Introduce la palabra en ingles:</label>
        <input type="text" name="clave" required>
        <br><br>
        <label for="valor">Introduce la palabra en español:</label>
        <input type="text" name="valor" value="<?= $palabra ?>" required>
        <br><br>
        <input type="submit" value="enviar">
      </form>
      <hr>
  <?php
    }
  }
  ?>

  <h3>Introduce una palabra en español</h3>
  <form action="" method="post">
    <input type="hidden" name="diccionario" value="<?= base64_encode(serialize($diccionario)) ?>">
    <input type="text" name="palabra">
    <input type="submit" value="buscar">
  </form>
</body>

</html>