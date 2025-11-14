<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio9</title>
</head>

<body>

    <?php
    // Pide al usuario una cadena de caracteres e imprimirla invertida. 
    if (isset($_GET['palabra'])) {
        $palabra = trim($_GET['palabra']);
        $invertida = strrev($palabra); 

        echo "<h2>Palabra original: $palabra</h2>";
        echo "<h2>Palabra invertida: $invertida</h2>";
    }

    ?>
    <form action="" method="get">
        <label>Introduce una cadena de carácteres</label>
        <input type="text" name="palabra">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>