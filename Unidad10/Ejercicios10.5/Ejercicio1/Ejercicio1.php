<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento</title>
    <link rel="stylesheet" href="Ejercicio1.css">
</head>
</head>

<body>
    <h1>Mantenimiento de clientes</h1>
    <?php
    // Conexión a la base de datos
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco2;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $consulta = $conexion->query("SELECT id, dni, nombre, direccion, telefono FROM cliente");
    ?>
    <table border="1">
        <thead>
            <tr class="fila__titulo">
                <th><b>DNI</b></th>
                <th><b>Nombre</b></th>
                <th><b>Dirección</b></th>
                <th><b>Teléfono</b></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($cliente = $consulta->fetchObject()) {
            ?>
                <tr>
                    <td><?= $cliente->dni ?></td>
                    <td><?= $cliente->nombre ?></td>
                    <td><?= $cliente->direccion ?></td>
                    <td class="botones"><?= $cliente->telefono ?>
                        <form action="eliminarCliente.php" method="post">
                            <input type="hidden" name="dni" value="<?= $cliente->dni ?>">
                            <input type="submit" name="eliminar" class="eliminar" value="Eliminar">
                        </form>
                        <form action="actualizarCliente.php" method="post">
                            <input type="hidden" name="id" value="<?=$cliente->id?>">
                            <input type="submit" name="modificar" class="modificar" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <form action="altaCliente.php" method="post">
                    <td><input type="text" name="dni" minlength="9" maxlength="9"></td>
                    <td><input type="text" name="nombre" required></td>
                    <td><input type="text" name="direccion" required></td>
                    <td><input type="number" name="telefono" required>
                        <input type="submit" value="Nuevo cliente" class="enviar">
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <br>
    Número de clientes: <?= $consulta->rowCount() ?>
    <?php $conexion = null; ?>
</body>

</html>