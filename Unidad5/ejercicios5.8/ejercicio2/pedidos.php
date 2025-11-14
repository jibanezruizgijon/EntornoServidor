<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>

<body>
    <h2>Hacer pedidos</h2>

    <?php
    $menu = [
        "Pizza" => ["jamon", "atun", "bacon", "pepperoni"],
        "Hamburguesa" => ["lechuga", "tomate", "queso"],
        "Perrito" => ["lechuga", "cebolla", "patata"]
    ];
    // Si la variable comida no ha sido recibida 
    if (!isset($_GET['comida'])) {
        $pedido = [];
        $cantidad = 0;
    } else {
        // Se recogen los datos en caso contrario
        $pedido = unserialize(base64_decode($_GET['pedido']));
        $comida = $_GET['comida'];
        $cantidad = ++$_GET['cantidad'];
        $pedido[] = $comida;
    }
    ?>
    <h3>Número de pedidos: <?= $cantidad ?></h3>
    <?php
    // Recorre cada comida para mostrarla 
    // En el checkbox se seleciona que ingredientes llevará cada comida
    // Tanto la comida como los ingredientes se almacenan en el mismo array
    foreach ($menu as $tipoComida => $ingredientes) {
    ?>
        <hr>
        <form action="" method="get">
            <input type="hidden" name="comida[]" value="<?= $tipoComida ?>">
            <label><b><?= $tipoComida ?></b>:</label>
            <?php
            foreach ($ingredientes as $ingrediente) {
            ?>
                <?= $ingrediente ?><input type="checkbox" name="comida[]" value="<?= $ingrediente ?>">
            <?php
            }
            ?>
            <br><br>
            <input type="hidden" name="cantidad" value="<?= $cantidad ?> ">
            <input type="hidden" name="pedido" value="<?= base64_encode(serialize($pedido)) ?>">
            <input type="submit" value="Añadir">

        </form>
    <?php
    }

    // Si se ha recibido comida se muestra la comida y los ingredientes seleccionados
    if (isset($_GET['pedido'])) {
        echo "<table>";

        foreach ($pedido as $p) {

            echo "<tr>";
            foreach ($p as $ingrediente) {
                if ($ingrediente == $p[0]) {
                    echo "<td> <b>$ingrediente:</b></td>";
                } else {
                    echo "<td> $ingrediente</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>


</body>

</html>