<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Producto</title>
</head>

<body>
    <div class="container">
        <h1>Detalle</h1>
        <img src="../View/images/<?= $data['producto']->getImgUrl() ?>" alt="">
        <h2>Producto: <?= $data['producto']->getNombre() ?></h2>
        <p><strong>Precio:</strong> <?= $data['producto']->getPrecio() ?></p>
        <p><strong>Descripción:</strong><?= $data['producto']->getDescripcion() ?></p>
        <form action="../Controller/comprarProducto.php" method="post">
            <input type="hidden" name="id" value="<?= $data['producto']->getId() ?>">
            <input type="submit" name="seleccionado1" class="botonCompra" value="Comprar">
        </form>
        <a href="../Controller/indexUser.php">Volver a la tienda</a>
    </div>
</body>

</html>