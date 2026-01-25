<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Realizada</title>
</head>

<body>
    <h1>Compra Realizada</h1>
    <?php
    if (isset($_POST['procesar'])) {
    ?>
        <a href="productosVendidos.txt">Factura Productos</a>
    <?php
    }
    ?>
    <a href="../Controller/index.php">Volver</a>
</body>

</html>