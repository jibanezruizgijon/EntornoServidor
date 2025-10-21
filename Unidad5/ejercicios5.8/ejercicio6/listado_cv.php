<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>

<body>

    <?php
    $curriculums = unserialize(base64_decode($_GET['curriculums']));

    $cadenaCV = base64_encode(serialize($curriculums));
    $num = 0;
    echo "<h2>Listado de curriculums</h2>";
    // Recorre todo el array para mostrar los dni
    // Cada dni es un enlace a otra página que muestra todos los datos de esa persona 
    foreach ($curriculums as $dni => $datos) {
    ?>
        <h3>Curriculum <?= $num ?></h3>
        <a href="mostrar_cv.php?curriculums=<?= $cadenaCV ?>&dni=<?= $dni ?>"><?= $dni ?></a>
        <br>
    <?php
        $num++;
    }
    ?>
    <br>
    <!-- Formulario para volver al menú principal -->
    <form action="menu_principal.php" method="get">
        <input type="hidden" name="curriculums" value="<?=$cadenaCV?>">
        <input type="submit" value="Volver a Menú">
    </form>
</body>

</html>