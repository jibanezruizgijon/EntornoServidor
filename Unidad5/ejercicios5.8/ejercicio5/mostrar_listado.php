<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar listado</title>
</head>

<body>
    <h1>Datos de trabajadores</h1>
    <?php
    $personas = unserialize(base64_decode($_POST['arrayPersonas']));
    // Recorre todas las personas añadidas 
    // Comrprueba si tiene más de 30 años para poner los datos en rojo
    foreach ($personas as $persona => $datos) {
        $color = ($datos["edad"] > 30) ? "red" : "black";
    ?>
        <div style="color: <?= $color ?>">
            <h2> Nombre: <?= $persona ?> </h2>
        <?php
        foreach ($datos as $campo => $valor) {
            echo  "<h3> $campo: $valor </h3>";
        }
        echo "</div> <hr>";
    }
        ?>
</body>

</html>