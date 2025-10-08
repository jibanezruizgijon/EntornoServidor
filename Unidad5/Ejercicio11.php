<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio11</title>
</head>

<body>
    <?php

    if (isset($_POST['palabra'])) {
        $palabra = $_POST['palabra'];
        $encontrada = false;
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
        "pencil" => "lapiz"
      ];

      foreach ($diccionario as $key => $value) {
       if($palabra === $value ){
        echo "La palabra $value en inglés es: $key";
        $encontrada = true;
       }
      }
      if (!$encontrada) {
        echo "La palabra $palabra no se ha encontado en el diccionario";
      }
    }

      
    ?>

    <h3>Introduce una palabra en español</h3>
    <form action="" method="post">
        <input type="text" name="palabra">
        <input type="submit" value="enviar">
    </form>
</body>

</html>