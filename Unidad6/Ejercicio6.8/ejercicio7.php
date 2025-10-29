<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
</head>

<body>
    <?php
    // Comprueba si en una frase se encuentra una determinada palabra pedida al usuario. 
    $frase = "Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar";
    echo "<h2>$frase</h2>";
    if (isset($_GET['palabra'])) {
        $palabra = trim(strtolower($_GET['palabra']));
        if (preg_match("/$palabra/", $frase)) {
            echo "La palabra $palabra si está en la frase";
        } else {
            echo "La palabra $palabra no está en la frase";
        }
    }
    ?>
    <form action="" method="get">
        <label>Introduce la palabra a buscar</label>
        <input type="text" name="palabra">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>