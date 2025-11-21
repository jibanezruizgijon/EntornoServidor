<?php
include_once "Menu.php";
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['menu'])) {
    $_SESSION['menu'] = [];
}

if (isset($_POST['nombre'])) {
    $menuSel = new Menu($_POST['nombre']);
    $_SESSION['menu'][$_POST['nombre']] = base64_encode(serialize($menuSel));
}

if (isset($_POST['seleccionado'])) {
    $menuSel = unserialize(base64_decode($_SESSION['menu'][$_POST['seleccionado']]));
}

if (isset($_POST['titulo'])) {
    $menuSel = unserialize(base64_decode($_SESSION['menu'][$_POST['seleccionado']]));
    $menuSel->añadirElemento( $_POST['titulo'], $_POST['enlace']);
    $_SESSION['menu'][$_POST['seleccionado']] = base64_encode(serialize($menuSel));
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Menú</h1>

    <form action="" method="post">
        <input type="text" name="nombre" required>
        <input type="submit" value="Crear Menú ">
    </form>
    <hr>
    <form action="" method="post">
        <select name="seleccionado" required>
            <?php
            foreach ($_SESSION['menu'] as $nombre => $menuSer) {
                echo " <option value='$nombre'>$nombre</option>";
            }
            ?>
        </select>
        <input type="submit" value="Mostrar">
    </form>
    <hr>
    <?php
    if (isset($menuSel)) {
    ?>
        <h2>Menú Seleccionado: <?= $menuSel->getNombre() ?></h2>
        <form action="" method="post">
            <label>Introduce el título:</label>
            <input type="text" name="titulo" required>
            <label>Introduce el enlace:</label>
            <input type="text" name="enlace" required>
            <input type="hidden" name="seleccionado" value="<?= $menuSel->getNombre() ?>">
            <input type="submit" value="añadir">
        </form>
    <?php
    }
    if (isset($_POST['mostrar'])) {
        if ($_POST['mostrar'] == "mostrarHorizontal") {
            echo $menuSel->mostrarHorizontal();
        } else {
            echo $menuSel->mostrarVertical();
        }
    }
    ?>


</body>

</html>