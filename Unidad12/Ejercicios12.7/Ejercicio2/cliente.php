<?php
  $respuesta = "";
  $url = "http://localhost/EntornoServidor/Unidad12/Ejercicios12.7/Ejercicio2/servicio.php";
  
    $parametros = http_build_query([
        'cantidad' => $_POST['cantidad']
      ]);
      
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
      if (isset($_POST['cantidad'])) {
       
      foreach ($variable as $key => $value) {
        # code...
      }
      }  
    ?>
</body>

</html>