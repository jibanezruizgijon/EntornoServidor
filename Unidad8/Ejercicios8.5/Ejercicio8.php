<?php

$nombre_archivo = "Archivo.txt";


// Aqui se guarda el texto recibido en el textarea al fichero
if (isset($_POST['guardar'])) {
    $manejador = fopen($nombre_archivo, "w");
    fputs($manejador, "Prueba de escritura aprenderaprogramar.com" . PHP_EOL);
    fclose($manejador);
}

// if (isset($_POST['terminar'])) {
// }

// Aquí se borra el fichero
if (isset($_POST['reiniciar'])) {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio8</title>
</head>

<body>
    <h1>Escribe un fichero línea a línea</h1>

    <form action="" method="post">
        <label>Escribe una línea para el fichero</label>
        <br>
        <textarea name="texto"></textarea>
        <br>
        <input type="submit" name="guardar" value="Guardar">
    </form>
    <br><br>
    <form action="" method="post">
        <input type="submit" name="terminar" value="Terminar">
    </form>
    <br>

    <?php
    if (isset($_POST['terminar'])) {
    ?>
        <p>Contenido del fichero:</p>
        <?php
        // Aqui se tiene que mostrar el contenido del fichero
        ?>
        <form action="" method="post">
            <input type="button" name="reiniciar" value="Reiniciar Fichero">
        </form>
    <?php
    }
    ?>
</body>

</html>