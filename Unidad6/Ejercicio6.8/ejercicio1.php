<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['palabra'])) {
        // Imprime carácter por carácter un string dado
        $palabra = $_GET['palabra'];

        echo "<h2>La palabra $palabra por carácteres</h2>";
        for ($i = 0; $i < strlen($palabra); $i++) {
            echo "<h2>$palabra[$i]</h2>";
        }
    }
    ?>

    <form action="" method="get">
        <label>Introduce una palabra:</label>
        <input type="text" name="palabra">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>