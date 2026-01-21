<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Stock</title>
</head>

<body>
    <h1>Modificar Stock del producto: <?= $data['producto']->getNombre()  ?></h1>

    <form action="../Controller/añadirStock.php" method="post">
        <input type="hidden" name="codigo" value="<?= $data['producto']->getCodigo() ?>">
        <label for="stock">Introduce la entrada de stock</label>
        <input type="number" name="añadido">
        <br>
        <input type="submit" value="Enviar">
    </form>
    <a href="../Controller/index.php" class="btn__volver">Volver</a>
</body>

</html>