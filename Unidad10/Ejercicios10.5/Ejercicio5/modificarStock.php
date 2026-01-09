<?php
// Conexión a la base de datos
try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

$consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, stock FROM articulo WHERE codigo='" . $_POST['codigo'] . "'");
$articulo = $consulta->fetchObject();

if (isset($_POST['salidaStock']) || isset($_POST['entradaStock'])) {
    $totalStock = 0;
    $nuevoStock = $_POST['stock'];

    if (isset($_POST['salidaStock'])) {
        $totalStock =  $articulo->stock - $nuevoStock;
        if ($totalStock < 0) {
            $totalStock = 0;
        }
    }
    if (isset($_POST['entradaStock'])) {
        $totalStock =  $articulo->stock + $nuevoStock;
    }

    $actualizar = "UPDATE articulo SET stock='{$totalStock}' WHERE codigo='{$_POST['codigo']}'";
    $conexion->exec($actualizar);
    $conexion = null;
    header("location: Ejercicio5.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php

    echo "<h1>Modificar Stock del producto con artículo: $articulo->codigo</h1> ";
    if (isset($_POST['entrada'])) {
    ?>

        <form action="" method="post">
            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
            <input type="hidden" name="entradaStock">
            <label for="stock">Introduce la entrada de stock</label>
            <input type="number" name="stock">
            <br>
            <input type="submit" value="Enviar">
        </form>
    <?php
    } else {
    ?>
        <form action="" method="post">
            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
            <input type="hidden" name="salidaStock">
            <label for="stock">Introduce la salida de stock</label>
            <input type="number" name="stock">
            <br>
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    $conexion = null;
    ?>

    <a href="Ejercicio5.php">Volver</a>
</body>

</html>