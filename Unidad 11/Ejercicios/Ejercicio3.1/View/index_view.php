<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión</title>
    <link rel="stylesheet" href="css/Ejercicio5.css">
</head>
</head>

<body>
    <h1>GESTISIMAL</h1>
    <table>
        <thead>
            <tr class="fila__titulo">
                <th><b>Código</b></th>
                <th><b>Descripción</b></th>
                <th><b>Precio de Compra</b></th>
                <th><b>Precio de Venta</b></th>
                <th><b>Margen</b></th>
                <th><b>Stock</b></th>
                <th><b><a href="verCarrito.php">Carrito</a></b></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = $conexion->query("SELECT * FROM articulo");
            $total = $consulta->rowCount();
            $cantidadMostrada = 3;
            $paginas = ceil($total / $cantidadMostrada);

            if (isset($_GET['pagina'])) {
                $paginaActual = (int)$_GET['pagina'];

                if ($paginaActual == 0) {
                    $paginaActual = 1;
                }

                if ($paginaActual > $paginas) {
                    $paginaActual = $paginas;
                }
            } else {
                $paginaActual = 1;
            }

            $inicio = ($paginaActual - 1) * $cantidadMostrada;
            $fin = ($inicio + $cantidadMostrada);
            $consulta2 = $conexion->query("SELECT * FROM articulo LIMIT $inicio , $cantidadMostrada");
            while ($articulo = $consulta2->fetchObject()) {
                // Para no comprar más opciones de las disponibles
                if (isset($_SESSION['carrito'][$articulo->codigo]["unidades"])) {
                    $stock =  $articulo->stock - $_SESSION['carrito'][$articulo->codigo]["unidades"];
                } else {
                    $stock = $articulo->stock;
                }
                // Para deshabilitar la opcion de compra
                $valor = ($stock == 0)? "disabled" : "enabled";
            ?>

                <tr>
                    <td><?= $articulo->codigo ?></td>
                    <td><?= $articulo->descripcion ?></td>
                    <td><?= $articulo->precioCompra ?></td>
                    <td><?= $articulo->precioVenta ?></td>
                    <td><?= $articulo->margen ?></td>
                    <td><?= $stock ?></td>
                    <td class="botones">
                        <form action="" method="post">
                            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
                            <input type="submit" name="comprar" class="enviar" <?=$valor ?>  value="Comprar">
                        </form>
                        <form action="eliminarArticulo.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
                            <input type="submit" name="eliminar" class="eliminar" value="Eliminar">
                        </form>
                        <form action="actualizarArticulo.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
                            <input type="submit" name="modificar" class="modificar" value="Modificar">
                        </form>
                        <form action="modificarStock.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
                            <input type="submit" name="entrada" class="stock" value="Entrada">
                        </form>
                        <form action="modificarStock.php" method="post">
                            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
                            <input type="submit" name="salida" class="stock" value="Salida">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td>Página <?= $paginaActual ?> de <?= $paginas ?></td>
                <td></td>
                <td>
                    <a href="?pagina=1" class="enlaces">Primera Página </a>
                </td>
                <td>
                    <a href="?pagina=<?= ($paginaActual - 1) ?>" class="enlaces">Página Anterior </a>
                </td>
                <td>
                    <a href="?pagina=<?= ($paginaActual + 1) ?>" class="enlaces">Siguiente Página</a>
                </td>
                <td>
                    <a href="?pagina=<?= $paginas ?>" class="enlaces">Última Página</a>
                </td>
            </tr>
            <tr class="titulo__nuevo">
                <td><b>código</b></td>
                <td><b>Descripción</b></td>
                <td><b>precioCompra</b></td>
                <td><b>precioVenta</b></td>
                <td><b>margen</b></td>
                <td><b>stock</b></td>
            </tr>
            <tr>
                <form action="altaArticulo.php" method="post">
                    <td><input type="text" name="codigo" minlength="4" maxlength="4" required></td>
                    <td><input type="text" name="descripcion" required></td>
                    <td><input type="number" step="any" min="0" name="precioCompra" required></td>
                    <td><input type="number" step="any" min="0" name="precioVenta" required></td>
                    <td></td>
                    <td><input type="number" name="stock" required></td>
                    <td><input type="submit" value="Nuevo artículo" class="enviar"></td>
                </form>
            </tr>
        </tbody>
    </table>
    <?php $conexion = null; ?>
</body>

</html>