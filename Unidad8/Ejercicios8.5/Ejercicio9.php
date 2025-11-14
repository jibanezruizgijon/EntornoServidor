<?php
/*
  Escribe un programa que guarde en un fichero el contenido de otros dos ficheros, de tal forma que en el fichero
resultante aparezcan las líneas de los primeros dos ficheros mezcladas, es decir, la primera línea será del primer
fichero, la segunda será del segundo fichero, la tercera será la siguiente del primer fichero, etc. Los nombres de los
dos ficheros origen y el nombre del fichero destino se deben pasar a través de un formulario. Hay que tener en
cuenta que los ficheros de donde se van cogiendo las líneas pueden tener tamaños diferentes.

  */

if (isset($_POST['add'])) {
    $archivo1 = $_POST['archivo1'];
    $archivo2 = $_POST['archivo2'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio9</title>
</head>

<body>
    <form enctype="multipart/form-data" action="" method="POST">
        <label>Recoge el primer archivo</label>
        <input type="file" name="archivo1" required>
        <br><br>
        <label>Recoge el segundo archivo</label>
        <input type="file" name="archivo2" required>
        <br><br>
        <input type="submit" name="add" value="Añadir">
    </form>
</body>

</html>