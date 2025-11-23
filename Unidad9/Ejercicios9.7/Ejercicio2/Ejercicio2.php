<?php
include_once "Menu.php";
if (session_status() == PHP_SESSION_NONE) session_start();

// Crea la sesión donde se crearán los menús y los índices
if (!isset($_SESSION['menu'])) {
    $_SESSION['menu'] = [];
}

// Si introduce un nombre de un menú nuevo lo crea en un objeto 
//  Mete ese objeto serializado en la sesión
if (isset($_POST['nombre'])) {
    $menuSel = new Menu($_POST['nombre']);
    $_SESSION['menu'][$_POST['nombre']] = base64_encode(serialize($menuSel));
}

// Cuando se seleccione la lista de diferenetes menús se deserializa de la sesión y lo mete en una variable
if (isset($_POST['seleccionado']) && !isset($_POST['titulo'])) {
    $menuSel = unserialize(base64_decode($_SESSION['menu'][$_POST['seleccionado']]));
}

// Cuando se introduce un título y un enlace se mete en una variable el menú deserializdo que había seleccionado guardado en la sesión
//Y añade mediante el método de la clase el nombre y título dentro del objeto
// Vuelve a serializar la variable y la mete en la sesión
if (isset($_POST['titulo'])) {
    $menuSel = unserialize(base64_decode($_SESSION['menu'][$_POST['seleccionado']]));
    $menuSel->añadirElemento($_POST['titulo'], $_POST['enlace']);
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
    <!-- Formulario para crear un nuevo menú -->
    <form action="" method="post">
        <input type="text" name="nombre" required>
        <input type="submit" value="Crear Menú ">
    </form>
    <hr>
    <!-- Formulario para mostrar y seleccionar los diferentes menús creados -->
    <form action="" method="post">
        <select name="seleccionado" required>
            <?php
            // Muestra todos los índices de la sesión que son los nombres de cada menú para seleccionarlos 
            foreach ($_SESSION['menu'] as $nombre => $menuSer) {
                echo " <option value='$nombre'>$nombre</option>";
            }
            ?>
        </select>
        <input type="submit" value="Mostrar">
    </form>
    <!-- Formulario para poner los titulos del menú seleccionado en vertical o en horizontal -->
    <form action="" method="post">
        <input type="hidden" name="seleccionado" value="<?= $menuSel->getNombre() ?>">
        <button type="submit" name="mostrar" value="mostrarHorizontal">Mostrar Horizontal</button>
        <button type="submit" name="mostrar" value="mostrarVertical">Mostrar Vertical</button>
    </form>
    <hr>
    <?php
    // Se muestra si  hay un menú seleccionado
    if (isset($menuSel)) {
    ?>
        <h2>Menú Seleccionado: <?= $menuSel->getNombre() ?></h2>
        <!-- Formulario para introducir un título y su enlace en el menú seleccionado -->
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
    // Muestra los títulos en vertical de forma predeterminada
    if (isset($_POST['titulo'])) {
        echo $menuSel->mostrarVertical();
    }
    // Muestra los títulos en vertical o en horizontal según lo seleccionado
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