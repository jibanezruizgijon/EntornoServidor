<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum completo</title>
</head>

<body>
    <?php
    $curriculums = unserialize(base64_decode($_GET['curriculums']));
    $dni = $_GET["dni"];

    $cadenaCV = base64_encode(serialize($curriculums));
    foreach ($curriculums as $curriculum => $datos) {
        if ($curriculum == $dni) {
            echo "DNI: $dni <br>";
            foreach ($datos as $titulo => $valor) {
                echo "<span><b>$titulo:</b> $valor</span>  <br>";
            }
        }
    }

    ?>
    <form action="listado_cv.php" method="get">
        <input type="hidden" name="curriculums" value="<?= $cadenaCV ?>">
        <input type="submit" value="Volver a listado">
    </form>
</body>

</html>