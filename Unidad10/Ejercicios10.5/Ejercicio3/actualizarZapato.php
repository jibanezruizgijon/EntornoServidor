<?php
try {
    $conexion = new PDO(
        "mysql:host=localhost;dbname=gestimal;charset=utf8",
        "root",
        "toor"
    );
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

// Modifica un Zapato
if (isset($_POST['dni']) && isset($_POST['nombre'])) {
    $actualizar = "UPDATE tiendaZapatos SET dni='{$_POST['dni']}', nombre='{$_POST['nombre']}', direccion='{$_POST['direccion']}', telefono='{$_POST['telefono']}' WHERE id='{$_POST['id']}'";
    $conexion->exec($actualizar);


    header("location: Ejercicio3.php");
    exit();
}

// Añade un zapato
if (isset($_POST['nuevoZapato'])) {
    $insercion = "INSERT INTO tiendaZapatos (nombre, precio, imagen, descripcion) VALUES
('$_POST[nombre]','$_POST[precio]','$_POST[imagen]','$_POST[descripcion]')";
    $conexion->exec($insercion);
}

// Elimina un Zapato
if (isset($_POST['eliminar'])) {
    $delete = "DELETE FROM tiendaZapatos WHERE id='" . $_POST['id'] . "'";
    $conexion->exec($delete);
    // header("Location: actualizarZapato.php");
    // exit();
}
$conexion = null;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>actualizar Zapato</title>
    <style>
        .botones {
            display: flex;
            justify-content: space-around;
            width: 190px;
        }

        .eliminar,
        .modificar,
        .enviar {
            color: white;
            border: none;
            border-radius: 5px;
            padding: 4px;

        }

        .eliminar {
            background-color: red;
        }

        .modificar {
            background-color: orange;
        }

        .enviar {
            background-color: green;
        }

        .fila__titulo {
            background-color: gray;
        }
    </style>
</head>

<body>
    <?php
    // Conexión a la base de datos
    try {
        $conexion = new PDO(
            "mysql:host=localhost;dbname=gestimal;charset=utf8",
            "root",
            "toor"
        );
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $consulta = $conexion->query("SELECT * FROM tiendaZapatos");
    ?>
    <table border="1">
        <thead>
            <tr class="fila__titulo">
                <th><b>nombre</b></th>
                <th><b>precio</b></th>
                <th><b>imagen</b></th>
                <th><b>descripción</b></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($zapato = $consulta->fetchObject()) {
            ?>
                <tr>
                    <td><?= $zapato->nombre ?></td>
                    <td><?= $zapato->precio ?></td>
                    <td><?= $zapato->imagen ?></td>
                    <td><?= $zapato->descripcion ?></td>
                    <td class="botones">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $zapato->id ?>">
                            <input type="submit" name="eliminar" class="eliminar" value="Eliminar">
                        </form>
                        <form action="modificarZapato" method="post">
                            <input type="hidden" name="id" value="<?= $zapato->id ?>">
                            <input type="submit" name="modificar" class="modificar" value="Modificar">
                        </form>
                    </td>


                </tr>
            <?php
            }
            ?>
            <tr class="fila__titulo">
                <td><b>nombre</b></td>
                <td><b>precio</b></td>
                <td><b>imagen</b></td>
                <td><b>descripción</b></td>
                <td></td>

            </tr>
            <tr>
                <form action="" method="post">
                    <td><input type="text" name="nombre" minlength="9" maxlength="9"></td>
                    <td><input type="number" step="any" name="precio" required></td>
                    <td><input type="text" name="imagen" required></td>
                    <td ><input style="width: 90%;" type="text" name="descripcion"></td>
                    <td class="botones"><input type="submit" name="nuevoZapato" value="Nuevo Zapato" class="enviar"></td>
                </form>
            </tr>
        </tbody>
    </table>
    <a href="Ejercicio3.php">Volver</a>
    <?php
    $conexion = null;
    ?>
</body>

</html>