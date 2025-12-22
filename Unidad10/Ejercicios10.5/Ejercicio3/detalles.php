<?php
session_start();

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

if (isset($_POST['compra'])) {
        $consulta = $conexion->query("SELECT * FROM tiendaZapatos WHERE id='" . $_POST['id'] . "'");
        $zapato = $consulta->fetchObject();
        if (!isset($_SESSION['carrito'][$zapato->id]["unidades"])) {
            $_SESSION['carrito'][$zapato->id]["unidades"] = 0;
        }
        $_SESSION['carrito'][$zapato->id]["unidades"]++;
        $_SESSION['total'] += $zapato->precio;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <style>
        * {
            font-family: sans-serif;
        }

        body {
            background-color: rgb(209, 232, 255);
            align-items: center;
            text-align: center;
        }

        p {
            margin-left: auto;
            margin-right: auto;
            max-width: 500px;
        }
    </style>
</head>

<body>
    <?php
    $consulta = $conexion->query("SELECT * FROM tiendaZapatos WHERE id='" . $_POST['id'] . "'");
    $zapato = $consulta->fetchObject();
    echo "<h2>Detalles del producto:$zapato->nombre</h2>";
    echo "<img src=" . $zapato->imagen . ">";
    echo "<h3>" . $zapato->nombre .  "</h3>";
    echo "<p>" . $zapato->descripcion .  "</p>";
    echo "<h3> Precio:" . $zapato->precio .  "€</h3>";


    ?>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $zapato->id ?>">
        <input type="submit" name="compra" value="comprar">
    </form>
    <br>
    <form action="Ejercicio3.php" method="post">
        <input type="submit" value="Volver">
    </form>
    <?php $conexion = null; ?>
</body>

</html>