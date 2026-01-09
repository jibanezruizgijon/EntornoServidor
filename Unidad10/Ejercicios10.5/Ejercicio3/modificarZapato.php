<?php

if (isset($_POST['nombre'])) {

    try {
        $conexion = new PDO(
            "mysql:host=localhost;dbname=gestimal;charset=utf8",
            "root",
            "toor"
        );
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    if ($_FILES["imagen"]["name"] != "") {
        $imagen = "img/" .  $_FILES["imagen"]["name"];
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen);
        unlink("img/". $_REQUEST["imagenActual"]);
    } else {
        $imagen = $_REQUEST["imagenActual"];
    }

    $actualizar = "UPDATE tiendaZapatos SET nombre='{$_POST['nombre']}', precio='{$_POST['precio']}', imagen='$imagen', descripcion='{$_POST['descripcion']}' WHERE id='{$_POST['id']}'";
    $conexion->exec($actualizar);
    $conexion = null;

    header("location: actualizarZapato.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Actualizar Zapato</title>
    <link rel="stylesheet" href="modificarZapato.css">
</head>

<body>
    <?php
    // Conexión a la base de datos
    try {
        $conexion = new PDO(
            "mysql:host=localhost;dbname=gestimal;charset=utf8",
            "root",
            "toor"
        );
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    if (isset($_POST['id']) && !isset($_POST['nombre'])) {
        $consulta = $conexion->query("SELECT * FROM tiendaZapatos WHERE id='" . $_POST['id'] . "'");
        $zapato = $consulta->fetchObject();
    ?>
        <h1>Modificar Zapato: <?= $zapato->nombre ?></h1>
        <form enctype="multipart/form-data" action="" method="post">
            <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
            <input type="text" name="nombre" value="<?= $zapato->nombre ?>" required>
            <input type="text" name="precio" value="<?= $zapato->precio ?>" required>
            <input type="hidden" name="imagenActual" value="<?= $zapato->imagen ?>" >
            <img src="<?= $zapato->imagen ?>">
            <input type="file" name="imagen">
            <input type="text" name="descripcion" value="<?= $zapato->descripcion ?>" required>
            <input type="submit" value="Confirmar">
        </form>
        <a href="actualizarZapato.php">Volver</a>
    <?php
    }
    $conexion = null;
    ?>
</body>

</html>