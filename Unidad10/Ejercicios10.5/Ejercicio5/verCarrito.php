<?php
if (session_status() == PHP_SESSION_NONE) session_start();


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

if (isset($_POST['eliminar'])) {
    $consulta = $conexion->query("SELECT*FROM articulo WHERE codigo='" . $_POST['codigo'] . "'");
    $articulo = $consulta->fetchObject();
    $_SESSION['carrito'][$articulo->codigo]["unidades"]--;
    $_SESSION['total'] -= $articulo->precioVenta;
}


if (isset($_POST['procesar'])) {
    $fp = fopen("productosVendidos.txt", "a");

    foreach ($_SESSION['carrito'] as $productos => $datos) {
        if ($datos["unidades"] != 0) {
            $consulta = $conexion->query("SELECT * FROM articulo WHERE codigo='" . $productos . "'");
            $articulo = $consulta->fetchObject();
            fwrite($fp, $articulo->codigo . "," . $articulo->descripcion . "," . $articulo->precioVenta * 1.21 . PHP_EOL);
        }
    }
    fwrite($fp, "Total:" . $_SESSION['total'] * 1.21  . PHP_EOL);
    fclose($fp);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .titulos {
            background-color: gray;
        }
    </style>
</head>

<body>
    <h1>Carrito</h1>
    <table>
        <thead class="titulos">
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th> Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['carrito'] as $productos => $datos) {
                if ($datos["unidades"] != 0) {
                    $consulta = $conexion->query("SELECT * FROM articulo WHERE codigo='" . $productos . "'");
                    $articulo = $consulta->fetchObject();

                    echo "<tr>";
                    echo "<td>$articulo->codigo</td>";
                    echo "<td>$articulo->descripcion</td>";
                    echo "<td>" . $datos['unidades'] . "</td>";
                    echo "<td>$articulo->precioVenta</td>";
            ?>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
                            <input type="submit" name="eliminar" class="eliminar" value="Eliminar">
                        </form>
                    </td>

            <?php

                    echo "</tr>";
                }
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Total: <?= $_SESSION['total'] ?></td>
            </tr>
        </tbody>
    </table>
    <a href="Ejercicio5.php">Volver</a>
    <br>
    <form action="" method="post">
        <input type="submit" name="procesar" value="Procesar pedido">
    </form>
    <br>
    <?php
    if (isset($_POST['procesar'])) {
    ?>
        <a href="productosVendidos.txt">Factura Productos</a>
    <?php
    }
    ?>

    <?php $conexion = null; ?>
</body>

</html>