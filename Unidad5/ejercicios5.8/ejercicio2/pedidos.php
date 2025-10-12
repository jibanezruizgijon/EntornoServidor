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
    $comidas = [
        "Pizza" => ["jamon", "atun", "bacon", "pepperoni"],
        "Hamburguesa" => ["lechuga", "tomate", "queso"],
        "Perrito" => ["lechuga", "cebolla", "patata"]
    ];
    //$cadenaComidas = serialize($comidas);


    foreach ($comidas as $comida => $ingredientes) {
    ?>
        <form action="">
            <label for="pizza"><?= $comida ?>:</label>
            <?php
            foreach ($ingredientes as $ingrediente) {
            ?>
                <?= $ingrediente ?><input type="checkbox" name="">
            <?php
            }
            ?>
            <br><br>
        </form>
    <?php
    }
    ?>
    <form action="mostrarPedidos.php" method="post">
        <label for="pedido">Enviar todo el pedido</label>
        <input type="hidden" name="cadenaComidas">
        <input type="submit" value="enviar">
    </form>
</body>

</html>