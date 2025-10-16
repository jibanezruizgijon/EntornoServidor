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

    $cadenaComidas = isset($_GET['cadenaComidas']) ?  unserialize(base64_decode($_GET['cadenaComidas'])) :  "";
    $pedidos = $cadenaComidas ? unserialize($cadenaComidas) : [];

    if (isset($_GET['comida']) && isset($_GET['ingredientes'])) {
        $comida = $_GET['comida'];
        $ingredientesEnviados = $_GET['ingredientes'];
        
        $pedidos[] = [
            "comida" => $comida,
            "ingredientes" => $ingredientesEnviados
        ];

        print_r($pedidos);
    }
    ?>
     <h3>Número de pedidos: <?= count($pedidos) ?></h3>
     <?php
    foreach ($comidas as $comida => $ingredientes) {
    ?>
        <hr>
        <form action="" method="get">

            <label for="pizza"><b><?= $comida ?></b>:</label>
            <?php
            foreach ($ingredientes as $ingrediente) {
            ?>
                <?= $ingrediente ?><input type="checkbox" name="ingredientes[]" value="<?= $ingrediente ?>">
            <?php
            }
            ?>
            <br><br>
            <input type="hidden" name="comida" value="<?= $comida ?>">
            <input type="hidden" name="cadenaComidas" value="<?= base64_encode(serialize($cadenaComidas)) ?>">
            <input type="submit" value="Añadir">

        </form>
    <?php
    }
    ?>
    <hr>
    <form action="mostrarPedidos.php" method="post">
        <label for="pedido">Enviar todo el pedido</label>
        <input type="hidden" name="cadenaComidas" value="<?= base64_encode(serialize($cadenaComidas)) ?>">
        <input type="submit" value="Finalizar">
    </form>


</body>

</html>