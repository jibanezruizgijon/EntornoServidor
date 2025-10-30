<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $fecha = "22-10-2021"; 
        echo date("d-m-Y",strtotime("$fecha + 1 days")); //sumo 1 día 
    ?>
</body>
</html>