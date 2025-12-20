<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .boton {
            height: 50px;
            width: 160px;
        }

        div {
            display: flex;
            gap: 30px;
        }
    </style>
</head>

<body>

    <h1>Confirmación de alta al cliente: <?= $_POST['nombre'] ?></h1>

    <div>
        <form action="altaCliente2.php" method="post">
            <input type="hidden" name="dni" value="<?= $_POST['dni'] ?>">
            <input type="hidden" name="nombre" value="<?= $_POST['nombre'] ?>">
            <input type="hidden" name="direccion" value="<?= $_POST['direccion'] ?>">
            <input type="hidden" name="telefono" value="<?= $_POST['telefono'] ?>">
            <input type="submit" value="CONFIRMAR" class="boton">
        </form>

        <form action="Ejercicio2.php" method="post">
            <input type="hidden" name="dniC" value="<?= $_POST['dni'] ?>">
            <input type="hidden" name="nombreC" value="<?= $_POST['nombre'] ?>">
            <input type="hidden" name="direccionC" value="<?= $_POST['direccion'] ?>">
            <input type="hidden" name="telefonoC" value="<?= $_POST['telefono'] ?>">
            <input type="submit" value="Cancelar" class="boton">
        </form>
    </div>

</body>

</html>