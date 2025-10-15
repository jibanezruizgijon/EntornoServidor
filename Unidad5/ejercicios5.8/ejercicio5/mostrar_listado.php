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
    foreach ($personas as $persona => $datos) {
        $color = ($datos["edad"] > 30) ? "red" : "black";
    ?>
        <div style="color: <?= $color ?>">
            <h2> Nombre: <?= $persona ?> </h2>
        <?php
        foreach ($datos as $dato) {
            echo  "<h3> $dato </h3>";
        }
        echo "</div> <hr>";
    }
        ?>
</body>

</html>