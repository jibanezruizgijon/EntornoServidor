<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="css/index.css">k
</head>

<body>
    <table>
        <tr class="headerTabla">
            <td colspan="3" class="tienda">La tiendecita</td>
            <td><a href="Cesta.php">Cesta<p class="titulos suma"><?= $suma ?>Prod</p></a></td>
        </tr>
        <tr class="headerTabla">
            <td class="titulos">Producto</td>
            <td class="titulos">Precio</td>
            <td class="titulos">Imagen</td>
            <td></td>
        </tr>
        <tr>
            <form enctype="multipart/form-data" action="" method="post">
                <td>
                    <label>Nombre:</label><input type="text" name="nombre" required>
                    <br><br>
                    <label>Descripción:</label><input type="text" name="descripcion" required>
                </td>
                <td><input type="Number" step="any" name="precio" required></td>
                <td><input type="file" name="imagen" required></td>
                <td><input type="submit" name="insertar" value="insertar"></td>
            </form>
        </tr>
        <?php
        $consulta = $conexion->query("SELECT * FROM tienda7");
        while ($articulo = $consulta->fetchObject()) {
            echo "<tr>";
            echo "<td>" .  $articulo->nombre . "</td>";
            echo "<td>" .  $articulo->precio . "</td>";
            echo "<td><a href='detalle.php?id=" . $articulo->id . "'><img src='" .  $articulo->imagen . "'></a></td>";
        ?>
            <td class="botonComprar">
                <form action="meteCarro.php" method="post">
                    <input type="hidden" name="id" value="<?= $articulo->id ?>">
                    <input type="submit" name="seleccionado" value="Comprar">
                </form>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $articulo->id ?>">
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