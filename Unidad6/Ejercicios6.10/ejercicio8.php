<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['nacimiento1']) && isset($_GET['nacimiento2'])) {
        $nacimiento1 = $_GET['nacimiento1'];
        $nacimiento2 = $_GET['nacimiento2'];
        $nombre1 = trim($_GET['nombre1']);
        $nombre2 =  trim($_GET['nombre2']);

        $fecha1 = strtotime(date($nacimiento1));
        $fecha2 = strtotime(date($nacimiento2));

        $edad1 = floor((time() - $fecha1) / (60 * 60 * 24 * 365.25));
        $edad2 = floor((time() - $fecha2) / (60 * 60 * 24 * 365.25));
        echo "<h2>$nombre1 de $edad1 años</h2>";
        echo "<h2>$nombre2 de $edad2 años</h2>";

        if ($fecha1 > $fecha2) {
            echo "<h2>$nombre1 es la persona mayor</h2>";
        } else {
            echo "<h2>$nombre2 es la persona mayor</h2>";
        }
        echo "<hr>";
    }
    ?>
    

    <form action="" method="get">
        <h3>Persona 1</h3>
        <label>Introduce la fecha de nacimiento</label>
        <input type="date" name="nacimiento1">
        <label>Introduce el nombre</label>
        <input type="text" name="nombre1">
        <br><br>
        <h3>Persona 2</h3>
        <label>Introduce la fecha de nacimiento</label>
        <input type="date" name="nacimiento2">
        <label>Introduce el nombre</label>
        <input type="text" name="nombre2">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>