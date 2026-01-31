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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Carrito</h1>
    <table>
        <thead class="titulos">
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($data['productos'] as $producto) {
                $id = $producto->getId();
                $precio = $producto->getPrecio();
                $unidades = $producto->getCantidad();
                $subtotal = $precio * $unidades;
                $total += $subtotal;
            ?>
                <tr>
                    <td><?= $producto->getNombre()  ?></td>
                    <td><?= $unidades ?></td>
                    <td><?= $producto->getPrecio() ?></td>
                    <td>
                        <form action="../Controller/eliminarProductoCesta.php" method="post">
                            <input type="hidden" name="id_producto" value="<?= $producto->getId() ?>">
                            <input type="submit" name="eliminar" class="eliminar" value="Eliminar">
                        </form>
                    </td>

                <?php

                echo "</tr>";
            }
                ?>
                <tr>
                    <td>Total: </td>
                    <td><?= $data['cantidad'] ?></td>
                    <td><?= $total ?>€</td>
                    <td></td>
                </tr>
        </tbody>
    </table>
    <a href="../Controller/indexUser.php">Volver</a>
    <br>
    <a  class="btn btn-warning" href="../Controller/vaciarCesta.php">Vaciar Cesta</a>
    <br>
    <form action="../Controller/mostrarCompra.php" method="post">
        <input class="btn btn-info" type="submit" name="procesar" value="Procesar pedido">
    </form>
    <br>

</body>

</html>