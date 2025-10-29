<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>

<body>
    <?php
    // Cambia todas las vocales de la frase  por otra vocal pedida al usuario
    // Controlando que lo que se envía es una vocal
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    $frase = "Tengo una hormiguita en la patita, que me esta haciendo cosquillitas y no me puedo aguantar";

    if (!isset($_GET['vocal']) || !in_array($_GET['vocal'], $vocales)) {
        echo "<h2>Introduce una vocal</h2>";
        echo "<p>Frase: " . $frase . "</p>";
    } else {
        $vocal = $_GET['vocal'];
        echo "<p>" . str_replace($vocales, $vocal, $frase) . "</p>";
    }

    ?>

    <form action="" method="get">
        <label>Introduce una vocal</label>
        <input type="text" name="vocal">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>