<?php
include_once "Factura.php";
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['facturas'])) {
    $_SESSION['facturas'] = [];
}

// Recoge el primer formulario y crea la factura
if (isset($_POST['crearFactura'])) {
    $fecha = $_POST['fechaFactura'];
    $estado = $_POST['estado'];
    $_SESSION['facturaActual'] = new Factura($fecha, $estado);
}

// Añade el producto en la factura creada
if (isset($_POST['añadirProducto']) && isset($_SESSION['facturaActual'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $_SESSION['facturaActual']->AñadeProducto($nombre, $precio, $cantidad);
}

//Guarda la factura con los productos añadidos
if (isset($_POST['guardarFactura']) && isset($_SESSION['facturaActual'])) {
    $_SESSION['facturas'][] = $_SESSION['facturaActual'];
    unset($_SESSION['facturaActual']);
}


if (isset($_POST['mostrarFacturas'])) {
    $mostrar = $_POST['mostrarFacturas'];
} else {
    $mostrar = "";
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
    <h1>Facturas</h1>

    <?php

    // Formulario donde se crea la factura
    if (!isset($_SESSION['facturaActual'])) {
    ?>
        <form action="" method="post">
            <input type="radio" name="estado" value="pagado">Pagado
            <input type="radio" name="estado" value="pendiente" checked required>Pendiente
            <br><br>

            <label for="">Fecha de la Factura</label>
            <input type="date" name="fechaFactura" required>
            <input type="submit" name="crearFactura" value="Crear Factura">
        </form>
    <?php
    } else {
    ?>
        <!-- Muestra la factura con los productos que se van añadiendo -->
        <h2>Factura en curso</h2>
        <?php
        echo $_SESSION['facturaActual']->ImprimeFactura();
        ?>
        <h3>Añadir producto</h3>
        <form action="" method="post">
            <label>Nombre: </label>
            <input type="text" name="nombre" required>
            <br><br>
            <label>Precio: </label>
            <input type="number" name="precio" required>
            <br><br>
            <label>Cantidad: </label>
            <input type="number" name="cantidad" required>
            <br><br>
            <input type="submit" name="añadirProducto" value="Añadir producto">
        </form>
        <br>
        <form action="" method="post">
            <input type="submit" name="guardarFactura" value="Guardar factura">
        </form>
    <?php
    }

    ?>
    <hr>

    <form action="" method="post">
        <input type="submit" name="mostrarFacturas" value="Mostrar facturas">
    </form>

    <?php
    // Muestra todas las facturas
    if (!empty($mostrar)) {
        if (empty($_SESSION['facturas'])) {
            echo "<h2>No hay facturas</h2>";
        } else {
            echo "<h2>Facturas creadas:</h2>";
            foreach ($_SESSION['facturas'] as $facturas => $factura) {
                echo "<h3>Factura -" . ($facturas + 1) . "</h3>";
                echo $factura->ImprimeFactura();
                echo "<br>";
            }
        }
    }
    ?>

</body>

</html>