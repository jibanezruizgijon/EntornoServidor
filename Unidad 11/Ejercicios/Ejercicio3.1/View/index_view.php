<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión</title>
    <link rel="stylesheet" href="../View/css/index.css">
</head>

<body>
    <h1>GESTISIMAL</h1>
    <table>
        <thead>
            <tr class="fila__titulo">
                <th><b>Código</b></th>
                <th><b>Nombre</b></th>
                <th><b>Precio</b></th>
                <th><b>Stock</b></th>
                <th><b><a href="../Controller/mostrarCarrito.php">Carrito</a></b></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['productos'] as $producto) {
                if (isset($_SESSION['carrito'][$producto->getCodigo()]["unidades"])) {
                    $stockVisual = $producto->getStock() - $_SESSION['carrito'][$producto->getCodigo()]["unidades"];
                } else {
                    $stockVisual = $producto->getStock();
                }
                $estadoBoton = ($stockVisual == 0) ? "disabled" : "enabled";
            ?>

                <tr>
                    <td><?= $producto->getCodigo() ?></td>
                    <td><?= $producto->getNombre() ?></td>
                    <td><?= $producto->getPrecio() ?></td>
                    <td><?= $stockVisual ?></td>
                    <td class="botones">
                        <form action="../Controller/comprarProducto.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $producto->getCodigo() ?>">
                            <input type="hidden" name="stock" value="<?= $stockVisual ?>">
                            <input type="submit" name="comprar" class="enviar" <?= $estadoBoton ?> value="Comprar">
                        </form>
                        <form action="../Controller/eliminarProducto.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $producto->getCodigo() ?>">
                            <input type="submit" name="eliminar" class="eliminar" value="Eliminar">
                        </form>
                        <form action="../Controller/modificarProducto.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $producto->getCodigo() ?>">
                            <input type="submit" name="modificar" class="modificar" value="Modificar">
                        </form>
                        <form action="../Controller/nuevoStock.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $producto->getCodigo() ?>">
                            <input type="submit" name="entrada" class="stock" value="Entrada">
                        </form>
                        <form action="../Controller/menosStock.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $producto->getCodigo() ?>">
                            <input type="submit" name="salida" class="stock" value="Salida">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
            
            <tr>
                <td>Página <?= $paginaActual ?> de <?= $paginas ?></td>
                <td>
                    <a href="?pagina=1" <?= $desactivar1 ?> class="enlaces">Primera Página </a>
                </td>
                <td>
                    <a href="?pagina=<?= max(1, $paginaActual - 1) ?>" <?= $desactivar1 ?>  class="enlaces">Página Anterior </a>
                </td>
                <td>
                    <a href="?pagina=<?= min($paginas, $paginaActual + 1) ?>" <?= $desactivar2 ?> class="enlaces">Siguiente Página</a>
                </td>
                <td>
                    <a href="?pagina=<?= $paginas ?>" <?= $desactivar2 ?> class="enlaces">Última Página</a>
                </td>
            </tr>

            <tr class="titulo__nuevo">
                <td><b>código</b></td>
                <td><b>nombre</b></td>
                <td><b>precio</b></td>
                <td><b>stock</b></td>
            </tr>
            <tr>
                <form action="../Controller/añadirProducto.php" method="post">
                    <td></td>
                    <td><input type="text" name="nombre" required></td>
                    <td><input type="number" step="any" min="0" name="precio" required></td> 
                    <td><input type="number" name="stock" required></td>
                    <td><input type="submit" value="Nuevo artículo" name="nuevo" class="enviar"></td>
                </form>
            </tr>
        </tbody>
    </table>
</body>
</html>