<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar</title>

    <style>
      body{
        text-align: center;
      }
    </style>
</head>

<body>
    <?php
    $intentos = $_GET["intentos"];
    $palabra = $_GET["palabra"];
    $cadena = $_GET["cadena"];
    $numeros = explode(",", $cadena);
    $correcta = "guepardo";
    $num = $_GET["num"];

    if ($palabra == $correcta) {
        ?>
         <h2>Enhorabuena, has acertado la palabra</h2> 
         <img src="img/guepardo.jpg">
        <?php
    } else{
         if ($intentos == 0) {
            ?>
              <h2>Lo siento, te has quedado sin intentos</h2>
              <img src="img/guepardo.jpg">
              <h3><?=$correcta?></h3>
            <?php
         } else {
            ?>
              <h2>Lo siento no has acertado, Te quedan <?=$intentos ?> intentos</h2>
              <a href="ejercicio3.php?num=<?= $num?>&intentos=<?= $intentos+1?>&cadena=<?=implode(",", $numeros) ?>">volver</a>
            <?php
         }
    }
    ?>
</body>

</html>