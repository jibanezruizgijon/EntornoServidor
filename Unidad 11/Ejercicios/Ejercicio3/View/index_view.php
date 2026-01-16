<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../View/css/index.css">
</head>

<body>
    <table>
        <tr class="headerTabla">
            <td colspan="3" class="tienda">La tiendecita</td>
            <td><a href="cesta_view.php">Cesta<p class="titulos suma"><?= $suma ?>Prod</p></a></td>
        </tr>
        <tr class="headerTabla">
            <td class="titulos">Producto</td>
            <td class="titulos">Precio</td>
            <td class="titulos">Imagen</td>
            <td></td>
        </tr>
        <tr>
            <form enctype="multipart/form-data" action="../Controller/creaProducto.php" method="post">
                <td>
                    <label>Nombre:</label><input type="text" name="nombre" required>
                    <br><br>
                    <label>Descripción:</label><input type="text" name="descripcion" required>
                </td>
                <td><input type="Number" step="any" name="precio" required></td>
                <td><input type="file" name="imgUrl" required></td>
                <td><input type="submit" name="insertar" value="insertar"></td>
            </form>
        </tr>

        <?php
        foreach ($data['productos'] as $producto) {
            echo "<tr>";
            echo "<td>" .  $producto->getNombre() . "</td>";
            echo "<td>" .  $producto->getPrecio() . "</td>";
            echo "<td><a href='detalle.php?id=" . $producto->getId() . "'><img src='../View/images/" .  $producto->getImgUrl() . "'></a></td>";
         ?>
            <td class="botonComprar">
                <form action="meteCarro.php" method="post">
                    <input type="hidden" name="id"  value="<?= $producto->getId() ?>">
                    <input type="submit" name="seleccionado" value="Comprar">
                </form>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                    <br>
                    <input type="submit" name="eliminar" value="Eliminar">
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