<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //$dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];

    if (isset($_GET['dia']) || isset($_GET['mes']) || isset($_GET['anio'])) {
        $dia = $_GET['dia'];
        $mes = $_GET['mes'];
        $anio = $_GET['anio'];

        $fechaFutura = strtotime("+$anio years +$mes months +$dia days");
        $fecha =  date("d-m-y", $fechaFutura);

        echo"<h3>$fecha</h3>";
    }
    ?>

    <h2>Introduce el timepo que pasará desde el actual</h2>
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
        <input type="submit" value="Enviar">
    </form>
</body>

</html>