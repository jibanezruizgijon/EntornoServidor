<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../View/css/index.css">
</head>

<body>
    <h1 class="titulo_admin">Administrador: <?= $_SESSION['nombre']  ?></h1>
    <table>
        <tr class="headerTabla">
            <td colspan="4" class="tienda">La tiendecita</td>
            <td><a href="../Controller/login.php">Cerrar Sesión</a></td>
        </tr>
        <tr class="headerTabla">
            <td class="titulos">Producto</td>
            <td class="titulos">Precio</td>
            <td class="titulos">Imagen</td>
            <td class="titulos">Stock</td>
            <td class="titulos">Eliminar</td>
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
                <td><input type="Number" name="stock" required></td>
                <td><input type="submit" name="insertar" value="insertar"></td>
            </form>
        </tr>

        <?php
        foreach ($data['productos'] as $producto) {
        ?>


            <tr>
                <td> <?= $producto->getNombre()  ?> </td>
                <td> <?= $producto->getPrecio()  ?> </td>
                <td><a href='../Controller/detalle.php?id="<?= $producto->getId() ?>"'><img src='../View/images/<?= $producto->getImgUrl()  ?>'></a></td>
                <td>
                    <?= $producto->getStock() ?>
                    <form action="../Controller/modificarStock.php" method="post">
                        <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                        <br>
                        <input type="submit" name="añadir" value="Añadir Stock">
                    </form>
                </td>

                <td class="botonComprar">
                    <form action="../Controller/comprobarEliminar.php" method="post">
                        <input type="hidden" name="id" value="<?= $producto->getId() ?>">
                        <br>
                        <input type="submit" name="eliminar" value="Eliminar">
                    </form>
                </td>
            <?php
            echo "</tr>";
        }
            ?>
    </table>
</body>

</html>