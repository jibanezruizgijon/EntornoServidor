<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento</title>
    <link rel="stylesheet" href="../View/css/Ejercicio2.css">
</head>
</head>

<body>
    <h1>Mantenimiento de clientes</h1>
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
          
            foreach ($data['clientes'] as $cliente) {
            ?>
                <tr>
                    <td><?= $cliente->getDni()?></td>
                    <td><?= $cliente->getNombre()?></td>
                    <td><?= $cliente->getDireccion() ?></td>
                    <td class="botones"><?= $cliente->getTelefono() ?>
                        <form action="../Controller/eliminarCliente.php" method="post">
                            <input type="hidden" name="id" value="<?= $cliente->getId() ?>">
                            <input type="submit" name="eliminar" class="eliminar" value="Eliminar">
                        </form>
                        <form action="../Controller/modificarCliente.php" method="post">
                            <input type="hidden" name="id" value="<?= $cliente->getId() ?>">
                            <input type="submit" name="modificar" class="modificar" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <form action="../Controller/altaCliente.php" method="post">
                    <td><input type="text" name="dni" minlength="9" maxlength="9"  required></td>
                    <td><input type="text" name="nombre"  required></td>
                    <td><input type="text" name="direccion"  required></td>
                    <td><input type="number" name="telefono" required>
                        <input type="submit" value="Nuevo cliente" class="enviar">
                    </td>
                </form>
            </tr>
        </tbody>
    </table>

    <?php
    echo "<div>";
    for ($i = 1; $i <= $paginas; $i++) {
        echo "<a  class='enlaces' href='?pagina=$i'>Página $i</a>";
    }
    echo "</div>";
    ?>
    <br>
    Número de clientes: <?= $total ?>
</body>

</html>