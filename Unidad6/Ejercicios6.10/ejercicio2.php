<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eejrcicio2</title>
</head>

<body>
    <?php

    if (isset($_GET['opcion'])) {
        $hora = $_GET['hora'];
        $minutos = $_GET['minutos'];
        $segundos = $_GET['segundos'];
        $opcion = $_GET['opcion'];

        $fecha = strtotime("$hora:$minutos:$segundos");
        $fecha2 =  date($opcion, $fecha);

        echo "<h2>Fecha en formato $opcion=> $fecha2</h2>";
    }
    ?>
    <h2>Introduce una hora</h2>
    <form action="" method="get">
        <label>Hora:</label>
        <input type="number" name="hora" value="<?=$hora ?>">
        <br><br>
        <label>Minutos:</label>
        <input type="number" name="minutos" value="<?=$minutos ?>">
        <br><br>
        <label>Segundos:</label>
        <input type="number" name="segundos" value="<?=$segundos ?>">
        <br><br>
        <label>Elige el formato:</label>
        <select name="opcion">
            <option value="G:i:s">G:i:s</option>
            <option value="g:i:s">g:i:s</option>
            <option value="H:i:s">H:i:s</option>
            <option value="H:i">H:i</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>