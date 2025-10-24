<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
        $palabra = "biblioteca";
        $array = str_split($palabra);
        echo "<h2>La palabra $palabra por carácteres</h2>";
        for ($i=0; $i < count($array) ; $i++) { 
            echo "<h2>$array[$i]</h2>";
        }
    ?>
</body>
</html>