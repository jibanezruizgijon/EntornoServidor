<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Stock</title>
</head>

<body>
    <h1>Modificar Stock del producto: <?= $producto->nombre  ?></h1>

    <form action="../Controller/reducirStock.php" method="post">
        <input type="hidden" name="codigo" value="<?= $producto->codigo ?>">
        <input type="hidden" name="salidaStock">
        <label for="stock">Introduce la salida de stock</label>
        <input type="number" name="stock">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>