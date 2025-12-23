<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_COOKIE['carro']) && !isset($_SESSION['carro'])) {
    $_SESSION['carro'] = unserialize(base64_decode($_COOKIE['carro']));
}

try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

if (!isset($_SESSION['carro'])) {
    $_SESSION['carro'] = [];
    $_SESSION['total'] = 0;
}

// Cuenta la cantidad de productos que hay en la cesta
$suma = 0;
foreach ($_SESSION['carro'] as $producto => $cantidad) {
    $suma += $cantidad['unidades'];
}


// Para crear un nuevo producto
if (isset($_POST['insertar'])) {
    $imagen = "img/" . $_FILES["imagen"]["name"];

    $insercion = "INSERT INTO tienda7 (nombre, descripcion, precio, imagen) VALUES
('$_POST[nombre]','$_POST[descripcion]','$_POST[precio]','$imagen')";

    $conexion->exec($insercion);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen);
}




// Para borrar un producto
if (isset($_POST['eliminar'])) {
    $nombre =  $_POST['eliminar'];

    $consulta = $conexion->query("SELECT * FROM tienda7 WHERE id='" . $_POST['id'] . "'");
    $articulo = $consulta->fetchObject();
    $rutaImagen = $articulo->imagen;
    if (file_exists($rutaImagen)) {
        unlink($rutaImagen);
    }
    $delete = "DELETE FROM tienda7 WHERE id='" . $_POST['id'] . "'";
    $conexion->exec($delete);
}
$conexion = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    ?>
    <table>
        <tr class="headerTabla">
            <td colspan="3" class="tienda">La tiendecita</td>
            <td><a href="Cesta.php">Cesta<p class="titulos suma"><?= $suma ?>Prod</p></a></td>
        </tr>
        <tr class="headerTabla">
            <td class="titulos">Producto</td>
            <td class="titulos">Precio</td>
            <td class="titulos">Imagen</td>
            <td></td>
        </tr>
        <tr>
            <form enctype="multipart/form-data" action="" method="post">
                <td>
                    <label>Nombre:</label><input type="text" name="nombre" required>
                    <br><br>
                    <label>Descripción:</label><input type="text" name="descripcion" required>
                </td>
                <td><input type="Number" step="any" name="precio" required></td>
                <td><input type="file" name="imagen" required></td>
                <td><input type="submit" name="insertar" value="insertar"></td>
            </form>
        </tr>
        <?php
        $consulta = $conexion->query("SELECT * FROM tienda7");
        while ($articulo = $consulta->fetchObject()) {
            echo "<tr>";
            echo "<td>" .  $articulo->nombre . "</td>";
            echo "<td>" .  $articulo->precio . "</td>";
            echo "<td><a href='detalle.php?id=" . $articulo->id . "'><img src='" .  $articulo->imagen . "'></a></td>";
        ?>
            <td class="botonComprar">
                <form action="meteCarro.php" method="post">
                    <input type="hidden" name="id"  value="<?= $articulo->id ?>">
                    <input type="submit" name="seleccionado" value="Comprar">
                </form>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $articulo->id ?>">
                    <br>
                    <input type="submit" name="eliminar" value="Eliminar">
                </form>
            </td>
        <?php
            echo "</tr>";
        }
        $conexion = null;
        ?>
    </table>
</body>

</html>