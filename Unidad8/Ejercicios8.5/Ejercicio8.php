<?php
$nombre_archivo = "Archivo.txt";

// Guardar línea en el fichero
if (isset($_POST['texto'])) {
    $texto = $_POST['texto'];
    $archivo = fopen($nombre_archivo, "a");
    fputs($archivo, $texto . PHP_EOL);
    fclose($archivo);
}

// Reiniciar fichero
if (isset($_POST['reiniciar'])) {
    if (file_exists($nombre_archivo)) {
        unlink($nombre_archivo);
    }
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
        <textarea name="texto" required autofocus></textarea>
        <br>
        <input type="submit" value="Guardar">
    </form>
    <br><br>

    <form action="" method="post">
        <input type="submit" name="terminar" value="Terminar">
    </form>
    <br>

    <?php
    // Mostrar fichero
    if (isset($_POST['terminar'])) {
        if (file_exists($nombre_archivo)) {
            echo "<p>Contenido del fichero:</p>";
            $fp = fopen($nombre_archivo, "r");
            while (!feof($fp)) {
                $linea = fgets($fp);
                echo $linea . "<br />";
            }
            fclose($fp);
    ?>
            <a href="<?= $nombre_archivo ?>">Mostrar archivo</a>
            <form action="" method="post">
                <input type="submit" name="reiniciar" value="Reiniciar Fichero">
            </form>
    <?php
        } else{
            echo "<h3>No hay archivos</h3>";
        }
    }
    ?>
</body>

</html>