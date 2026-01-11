<?php

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
session_start();
// Si es la primera vez que se abre se inicia el array con los datos y el total 
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
    $_SESSION['total'] = 0;
} else {

    //Añade una unidad del producto al carrito
    if (isset($_POST['compra'])) {
        $consulta = $conexion->query("SELECT id, nombre, precio FROM tiendaZapatos WHERE id='" . $_POST['id'] . "'");
        $zapato = $consulta->fetchObject();
        if (!isset($_SESSION['carrito'][$zapato->id]["unidades"])) {
            $_SESSION['carrito'][$zapato->id]["unidades"] = 0;
        }
        $_SESSION['carrito'][$zapato->id]["unidades"]++;
        $_SESSION['total'] += $zapato->precio;
    }

    // Elimina una unidad del producto seleccionado
    if (isset($_POST['eliminar'])) {
        $consulta = $conexion->query("SELECT id, nombre, precio FROM tiendaZapatos WHERE id='" . $_POST['id'] . "'");
        $zapato = $consulta->fetchObject();
        $_SESSION['carrito'][$zapato->id]["unidades"]--;
        $_SESSION['total'] -= $zapato->precio;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Nike</title>
    <link rel="stylesheet" href="Ejercico3.css">
</head>

<body>
    <header>
        <h1>Tienda Online de zapatos</h1>
        <h2>NIKE</h2>
    </header>
    <div class="container">
        <section class="compra">
            <h3>Productos</h3>
            <hr>
            <?php
            // Conexión a la base de datos

            $consulta = $conexion->query("SELECT * FROM tiendaZapatos");
            // Muestra los datos del producto con la opción de compra
            // Da la opción de mostrar detalles del producto específico
            while ($zapato = $consulta->fetchObject()) {
                echo "<img src=" . $zapato->imagen . ">";
                echo "<h3>" . $zapato->nombre .  "</h3>";
                echo "<h3> Precio:" . $zapato->precio .  "€</h3>";
            ?>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $zapato->id ?>">
                    <input type="submit" name="compra" value="comprar">
                </form>
                <br>
                <form action="detalles.php" method="post">
                    <input type="hidden" name="id" value="<?= $zapato->id ?>">
                    <input type="submit" value="Detalles">
                </form>
                <br><br>
            <?php
            }
            ?>
        </section>
        <section class="muestra">
            <h3>Carrito</h3>
            <hr>
            <?php
            // Muestra el carrito con las compras hechas en caso de que se haya comprado algo
            // Con la opción de eliminar una unidad del producto en el carrito

            foreach ($_SESSION['carrito'] as $productos => $datos) {
                if ($datos["unidades"] != 0) {
                    $consulta = $conexion->query("SELECT id, nombre,imagen, precio FROM tiendaZapatos WHERE id='" . $productos . "'");
                    $zapato = $consulta->fetchObject();
                    echo "<img src=" . $zapato->imagen . ">";
                    echo "<h3>" . $zapato->nombre .  "</h3>";
                    echo "<h3> Precio:" . $zapato->precio .  "€</h3>";
                    echo "<h3>Unidades:" . $datos["unidades"] . "</h3>";


            ?>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $zapato->id ?>">
                        <input type="submit" name="eliminar" value="eliminar">
                    </form>
            <?php
                }
                echo "<br>";
            }
            echo "<h3>Precio total: " . $_SESSION['total'] . "</h3>";
            ?>
        </section>
        <section>
            <form action="actualizarZapato.php" method="post">
                <input type="submit" name="administrar" value="Administrar productos" class="boton">
            </form>
        </section>
    </div>
    <?php $conexion = null; ?>
</body>

</html>