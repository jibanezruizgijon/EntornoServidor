<?php
if (session_status() == PHP_SESSION_NONE) session_start();

try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

// Cuenta la cantidad de productos que hay en la cesta
$suma = 0;
foreach ($_SESSION['carro'] as $producto => $cantidad) {
    $suma += $cantidad['unidades'];
}


// Cuenta los euros totales que cuestan los productos de la cesta
$total = 0;

foreach ($_SESSION['carro'] as $id => $datos) {
    $consulta = $conexion->query("SELECT * FROM tienda7 WHERE id='" . $id . "'");
    $articulo = $consulta->fetchObject();
    // En caso de que se elimine de la base de datos
    if ($articulo == false) {
       unset($_SESSION['carro'][$id]);
       continue;
    }
    if ($datos["unidades"] != 0) {
        $total += $articulo->precio * $datos['unidades'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>
    <link rel="stylesheet" href="css/cesta.css">
</head>

<body>
    <table>

        <tr class="headerTabla">
            <td class="titulos" colspan="4">Productos de la cesta</td>
        </tr>
        <?php

        foreach ($_SESSION['carro'] as $id => $datos) {
            $consulta = $conexion->query("SELECT * FROM tienda7 WHERE id='" . $id . "'");
            $articulo = $consulta->fetchObject();
             if ($datos["unidades"] != 0) {
                echo "<tr>";
                echo "<td>" .  $articulo->nombre . "</td>";
                echo "<td>" .  $articulo->precio . "</td>";
                echo "<td><a href='detalle.php?id=" . $articulo->id . "'><img src='" .  $articulo->imagen . "'></a> <p>" . $articulo->precio . " euros</p></td>";
        ?>
                <td class="botonComprar">
                    <form action="QuitaCarro.php" method="post">
                        <input type="hidden" name="id" value="<?= $articulo->id ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
                </tr>
        <?php
            }
        }
        ?>
        <tr>
            <td>Total</td>
            <td><?= $suma ?></td>
            <td><?= $total ?></td>
            <td>
                <a href="vaciarCesta.php" class="volver">Vaciar cesta</a>
            </td>
        </tr>
        <tr>
            <td colspan="4"><a href="index.php" class="volver">Volver al la tienda</a></td>
        </tr>
    </table>
    <?php $conexion = null; ?>
</body>

</html>