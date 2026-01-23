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
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($data['productos'] as $producto) {
                $id = $producto->getId();
                if (isset($_SESSION['cesta'][$id]) && $_SESSION['cesta'][$id]['unidades'] > 0) {
                    $unidades = $_SESSION['cesta'][$id]['unidades'];
                    $precio = $producto->getPrecio();
                    $subtotal = $precio * $unidades;
                    $total += $subtotal;
            ?>
                    <tr>
                        <td><?= $producto->getNombre()  ?></td>
                        <td><?= $producto->getPrecio() ?></td>
                        <td><?= $unidades ?></td>

                        <td>
                            <form action="../Controller/eliminarProductoCesta.php" method="post">
                                <input type="hidden" name="id" value="<?= $id ?>">
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
                        <td>Total: <?= $total ?></td>
                    </tr>
        </tbody>
    </table>
    <a href="../Controller/index.php">Volver</a>
    <br>
    <a href="../Controller/vaciarCesta.php">Vaciar Cesta</a>
    <br>
    <form action="../Controller/mostrarCompra.php" method="post">
        <input type="submit" name="procesar" value="Procesar pedido">
    </form>
    <br>
</body>

</html>