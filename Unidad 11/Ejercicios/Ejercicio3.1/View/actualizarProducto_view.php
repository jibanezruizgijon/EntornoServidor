<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="../View/css/actualizar.css">
</head>

<body>
    <div class="container">
        <form action="../Controller/actualizarProducto.php" class="formulario" method="POST">
            <input type="hidden" name="codigo" value="<?= $data['producto']->getCodigo() ?>">

            <h3 class="label">Nombre</h3>

            <input type="text" class="titulo" name="nombre" value="<?= $data['producto']->getNombre() ?>">

            <h3 class="label">Precio</h3>

            <input type="number" step="any" class="titulo" name="precio" value="<?= $data['producto']->getPrecio() ?>">

            <h3 class="label">Stock</h3>

            <input type="number" class="titulo" name="stock" value="<?= $data['producto']->getStock() ?>">

            <input type="submit" class="btn__enviar" value="Aceptar">
        </form>

        <a href="../Controller/index.php" class="btn__volver">Volver</a>
    </div>
</body>

</html>