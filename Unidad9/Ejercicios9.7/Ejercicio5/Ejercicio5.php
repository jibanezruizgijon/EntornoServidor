<?php
include_once 'Pinguino.php';
include_once 'Gato.php';
include_once 'Canario.php';
include_once 'Perro.php';
include_once 'Lagarto.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  $tom = new Gato("hembra", 4, 3, "omnívoro", "persa");  

  $luis = new Canario("macho", 2, 0.50, "verde");

  echo "$tom<br>";
  echo $tom->duerme();
  echo $tom->comer("carne");

  echo "$luis<br>";
  echo $luis->vuela();
?>
</body>

</html>