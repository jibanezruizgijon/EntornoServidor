<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión</title>
    <link rel="stylesheet" href="css/Ejercicio4.css">
</head>
</head>

<body>
    <h1>GESTISIMAL</h1>
    <?php
    // Conexión a la base de datos
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, margen, stock FROM articulo");
    ?>
    <table>
        <thead>
            <tr class="fila__titulo">
                <th><b>Código</b></th>
                <th><b>Descripción</b></th>
                <th><b>Precio de Compra</b></th>
                <th><b>Precio de Venta</b></th>
                <th><b>Margen</b></th>
                <th><b>Stock</b></th>
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
            ?>

                <tr>
                    <td><?= $articulo->codigo ?></td>
                    <td><?= $articulo->descripcion ?></td>
                    <td><?= $articulo->precioCompra ?></td>
                    <td><?= $articulo->precioVenta ?></td>
                    <td><?= $articulo->margen ?></td>
                    <td><?= $articulo->stock ?></td>
                    <td class="botones">
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