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
    // Primer array asociativo y el segundo con los ingredientes que sea clásico
    // Enviar un array con todos los ingredientes
    // Inicializar el array pedidos y cantidad si no recibe comidas
    // else si ya recibe comida se introducen los datos usando unserialize base 64 de pedido
    // $pedido = unserialize ['pedido']
    // $pedido[] = $_REQUEST['comida]
    //$cantidad = ++$REQUEST['cantidad']
    // mostrar abajo siemrpe el 
    $menu = [
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

      

        print_r($pedidos);
    }
    ?>
    <h3>Número de pedidos: <?= count($pedidos) ?></h3>
    <?php
    foreach ($menu as $c => $ingredientes) {
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

            <input type="hidden" name="cadenaComidas" value="<?= base64_encode(serialize($pedido)) ?>">
            <input type="submit" value="Añadir">

        </form>
    <?php
    }
    ?>

</body>

</html>