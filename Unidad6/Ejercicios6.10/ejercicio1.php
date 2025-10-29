<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    use BcMath\Number;

    use function PHPSTORM_META\type;

    if (isset($_GET['opcion'])) {
        $dia = $_GET['dia'];
        $mes = $_GET['mes'];
        $anio = $_GET['anio'];
        $opcion = $_GET['opcion'];

        if (checkdate($mes, $dia, $anio)) {
            echo "<h2>Fecha mal introducida</h2>";
        } else {
            if ($opcion == "d/m/Y") {
               $fecha =  date($opcion, ["$dia", "$mes", "$anio"]);
            }
        }
    }
    ?>
    <h2 style="color: red;"></h2>
    <h2>Introduce una fecha</h2>
    <form action="" method="get">
        <label>Día:</label>
        <input type="number" name="dia">
        <br><br>
        <label>Mes:</label>
        <input type="number" name="mes">
        <br><br>
        <label>Año:</label>
        <input type="number" name="anio">
        <br><br>
        <label>Elige el formato:</label>
        <select name="opcion">
            <option value="d/m/Y">d/m/Y</option>
            <option value="j/n/y">j/n/y</option>
            <option value="Y/m/d">Y/m/d</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>