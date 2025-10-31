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
        $meses = ["01" =>"Enero","02" =>"Febrero", "03" =>"Marzo","04" => "Abril","05" =>"Mayo","06" => "Junio","07" => "Julio","08" => "Agosto","09" => "Septiembre","10" => "Octubre", "11" =>"Noviembre","12" => "Diciembre"];
        
        $fechaArray = explode("-", $fecha);
        $mes =  $meses[$fechaArray[1]];
        echo "<h2>$fechaArray[2] de $mes del $fechaArray[0]</h2>";
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