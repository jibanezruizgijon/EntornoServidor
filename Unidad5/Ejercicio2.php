<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>

<body>
    <?php
    if (isset($_POST['n'])) {
        $contador = $_POST['contador'];
        $cadenaTexto = $_POST['cadenaTexto'];
    } else {
        $contador = 0;
        $cadenaTexto = "";
    }

    if($contador == 6){
       // PHP_INT_MAX   PHP_INT_MIN

       
       ?>
        <h3>Mínimo: </h3>
        <h3>Máximo: </h3>
       <?php
      
    } else{
       ?>
       <form action="" method="post">
        <label for="">Introduce 10 números </label>
        <input type="number" name="n" autofocus>
        <input type="hidden" name="contador" value="<?= ++$contador ?> ">
        <input type="hidden" name="cadenaTexto" value="<?= $cadenaTexto ?>">
        <input type="submit" value="enviar">
    </form>
       <?php
          } 
       ?>
</body>

</html>