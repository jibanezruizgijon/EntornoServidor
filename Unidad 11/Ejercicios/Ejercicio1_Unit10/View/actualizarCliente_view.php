<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
    <link rel="stylesheet" href="../View/css/actualizarCliente2.css">
</head>

<body>
    <h1>Actualizar Cliente: <?= $cliente->nombre ?></h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <div>
            <label for="dni">DNI</label>
            <input type="text" name="dni" value="<?= $cliente->dni ?>" required>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?= $cliente->nombre ?>" required>
        </div>

        <div>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" value="<?= $cliente->direccion ?>" required>
        </div>

        <div> <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" value="<?= $cliente->telefono ?>" required>
        </div>
        <input type="submit" value="Confirmar">
    </form>
    <a href="../Controller/index.php">Volver</a>
</body>

</html>