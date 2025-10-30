<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $dias = ["07"=>"Domingo","01"=>"Lunes","02"=> "Martes","03"=> "Miércoles","04"=> "Jueves","05"=> "Viernes","06"=> "Sábado"];

    if (isset($_GET['opcion'])) {
        $dia = $_GET['opcion'];
        $fecha = "$dia-10-2000";

        $diaMas = date("d-m-Y", strtotime("$fecha + 1 days"));
        $diaSiguiente = substr($diaMas, 0, 2);

        echo "<h2>Día siguiente: $dias[$diaSiguiente]</h2>";
    }
    ?>

    <form action="" method="get">
        <select name="opcion">
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miércoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sábado</option>
            <option value="0">Domingo</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>