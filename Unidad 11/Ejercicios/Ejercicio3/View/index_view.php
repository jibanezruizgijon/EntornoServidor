<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="css/index.css">
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
    foreach ($data['productos'] as $producto) {
        echo "<tr>";
            echo "<td>" .  $producto->nombre . "</td>";
            echo "<td>" .  $producto->precio . "</td>";
            echo "<td><a href='detalle.php?id=" . $producto->id . "'><img src='" .  $articulo->imagen . "'></a></td>";
        }
        $conexion = null;
        ?>
    </table>
</body>

</html>