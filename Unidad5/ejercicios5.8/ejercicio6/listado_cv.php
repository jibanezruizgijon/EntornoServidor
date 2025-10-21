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
    foreach ($curriculums as $curriculum => $datos) {
    ?>
        <h3>Curriculum <?= $num ?></h3>
        <a href="mostrar_cv.php?curriculums=<?= $cadenaCV ?>&dni=<?= $curriculum ?>"><?= $curriculum ?></a>
        <br>
    <?php
        $num++;
    }
    ?>
    <br>
    <form action="menu_principal.php" method="get">
        <input type="hidden" name="curriculums" value="<?=$cadenaCV?>">
        <input type="submit" value="Volver a Menú">
    </form>
</body>

</html>