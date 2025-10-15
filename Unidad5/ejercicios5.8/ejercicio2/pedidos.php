<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>

<body>
    <?php
    $nPedidos = isset($_REQUEST['nPedidos']) ? $_GET['nPedidos'] : 0;

    ?>
    <h2>Hacer pedidos</h2>
    <h3>Comidas en el pedido: <?= $nPedidos ?></h3>
    <?php
    $comidas = [
        "Pizza" => ["jamon", "atun", "bacon", "pepperoni"],
        "Hamburguesa" => ["lechuga", "tomate", "queso"],
        "Perrito" => ["lechuga", "cebolla", "patata"]
    ];
    //$cadenaComidas = serialize($comidas);

    $cadenaComidas = isset($_REQUEST['cadenaComidas']) ? $_GET['cadenaComidas'] :  "";
    
    if (isset($_REQUEST['cadenaComidas'])) {
        
    }

    foreach ($comidas as $comida => $ingredientes) {

    ?>
        <hr>
        <form action="" method="get">

            <label for="pizza"><b><?= $comida ?></b>:</label>
            <?php
            foreach ($ingredientes as $ingrediente) {
            ?>
                <?= $ingrediente ?><input type="checkbox" name="">
            <?php
            }
            ?>
            <br><br>
            <input type="submit" value="enviar">
            <input type="hidden" name="cadenaComida" value=" <?= $cadenaComidas ?>">
            <input type="hidden" name="nPedidos" value="<?= $nPedidos + 1 ?>">
        </form>
    <?php
    }
    ?>
    <hr>
    <form action="mostrarPedidos.php" method="post">
        <label for="pedido">Enviar todo el pedido</label>
        <input type="hidden" name="cadenaComidas" value="<?= serialize($cadenaComidas) ?>">
        <input type="submit" value="Finalizar">
    </form>
</body>

</html>