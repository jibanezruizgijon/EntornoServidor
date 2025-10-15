<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar listado</title>
</head>

<body>
    <h2>Datos de trabajadores</h2>
    <?php
    $personas = unserialize(base64_decode($_POST['arrayPersonas']));
        print_r($personas);
        foreach ($personas as $persona => $datos) {
            echo "<h2> $persona </h2> ";
            
            foreach ($datos as $dato) {
                echo  " <h3>$dato </h3>";
            }
            echo " <hr>";

        }
        ?>
</body>

</html>