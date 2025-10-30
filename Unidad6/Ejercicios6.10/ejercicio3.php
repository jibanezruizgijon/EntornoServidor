<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['fecha'])) {
        $fecha = $_GET['fecha'];
        $dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"];

        $fecha2 = strtotime($fecha);
        $dia =  date("w", $fecha2);
        $correspondiente = $dias[$dia];
        echo "<h2>$correspondiente</h2>";
    }
    ?>

    <form action="" method="get">
        <label>Introduce una fecha:</label>
        <input type="date" name="fecha">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>