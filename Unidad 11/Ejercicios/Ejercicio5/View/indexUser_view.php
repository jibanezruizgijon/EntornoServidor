<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../View/css/index.css">
</head>

<body>
    <h1 class="titulo_admin">Cliente: <?= $_SESSION['nombre'] ?></h1>
    <table>
        <tr class="headerTabla">
            <td colspan="4" class="tienda">La tiendecita</td>
            <td><a href="../Controller/mostrarCesta.php">Cesta: <?= $data['cantidad'] ?>prod</a></td>
        </tr>
        <tr class="headerTabla">
            <td class="titulos">Producto</td>
            <td class="titulos">Precio</td>
            <td class="titulos">Imagen</td>
            <td class="titulos">Stock</td>
            <td><a href="../Controller/login.php">Cerrar Sesión</a></td>
        </tr>
        <?php
        foreach ($data['productos'] as $producto) {
        if ($cesta = Cesta::getProductoById($_SESSION['idUsuario'], $producto->getId())) {
            $cesta = Cesta::getCestaByIdAndCod($_SESSION['idUsuario'], $producto->getId());
            $stockTemp = $producto->getStock() - $cesta->getCantidad();
        } else{
            $stockTemp = $producto->getStock();
        }
            echo "<tr>";
            echo "<td>" .  $producto->getNombre() . "</td>";
            echo "<td>" .  $producto->getPrecio() . "</td>";
            echo "<td><a href='../Controller/detalle.php?id=" . $producto->getId() . "'><img src='../View/images/" .  $producto->getImgUrl() . "'></a></td>";
            echo "<td> $stockTemp </td>";
        ?>
            <td class="botonComprar">
                <form action="../Controller/comprarProducto.php" method="post">
                    <input type="hidden" name="codigoProducto" value="<?= $producto->getId() ?>">
                    <input type="hidden" name="stock" value="<?= $producto->getStock() ?>">
                    <input type="submit" name="comprar" value="Comprar">
                </form>
            </td>
        <?php
            echo "</tr>";
        }
        $conexion = null;
        ?>
    </table>
</body>

</html>