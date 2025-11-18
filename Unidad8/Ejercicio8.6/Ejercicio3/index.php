<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_COOKIE['carro']) && !isset($_SESSION['carro'])) {
    $_SESSION['carro'] = unserialize(base64_decode($_COOKIE['carro']));
}
// Cuando se inicia por primera vez
if (!isset($_SESSION['productos'])) {

    $fp = fopen("productos.txt", "r");

    while (!feof($fp)) {

        $linea = fgets($fp);
        $arrayDatos = explode("-", $linea);
        $_SESSION['productos'][] = [
            "nombre" => $arrayDatos[0],
            "precio" => $arrayDatos[1],
            "img"   => $arrayDatos[2],
            "descripcion"   => $arrayDatos[3]
        ];
    }
    fclose($fp);
}

if (!isset($_SESSION['carro'])) {
    $_SESSION['carro'] = [];
}
// Cuenta la cantidad de productos que hay en la cesta
$suma = 0;
foreach ($_SESSION['carro'] as $producto => $cantidad) {
    $suma += $cantidad;
}



if (isset($_POST['insertar'])) {
    $nombre =  $_POST['nombre'];
    $precio =  $_POST['precio'];
    $imagen = "img/" . $_FILES["imagen"]["name"];

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen)) {
        $fp = fopen("productos.txt", "a");

        fwrite($fp, $nombre . "-" . $precio . "-" . $imagen . PHP_EOL);

        fclose($fp);
    }

    $_SESSION['productos'][] = [
        "nombre" => $nombre,
        "precio" => $precio,
        "img"   => $imagen,
    ];
}

if (isset($_POST['borrar'])) {
    $nombre =  $_POST['borrar'];


    foreach ($_SESSION['productos'] as $producto => $datos) {
        if ($datos['nombre'] == $nombre) {
            unset($_SESSION['productos'][$producto]);
        }
    }
    $fp = fopen("productos.txt", "w");
    while (!feof($archivo)) {
       fwrite($fp, $datos["nombre"] . "-" . $datos["precio"] . "-" . $datos["img"] . PHP_EOL);
    }

    fclose($fp);
}
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
                <td><input type="text" name="nombre" required></td>
                <td><input type="Number" name="precio" required></td>
                <td><input type="file" name="imagen" required></td>
                <td><input type="submit" name="insertar" value="insertar"></td>
            </form>
        </tr>
        <?php
        foreach ($_SESSION['productos'] as $producto => $datos) {
            echo "<tr>";
            echo "<td>" .  $datos["nombre"] . "</td>";
            echo "<td>" .  $datos["precio"] . "</td>";
            echo "<td><a href='detalle.php?producto=" . $datos["nombre"] . "'><img src='" .  $datos["img"] . "'></a></td>";
        ?>
            <td class="botonComprar">
                <form action="meteCarro.php" method="post">
                    <input type="hidden" name="seleccionado" value="<?= $datos["nombre"] ?>">
                    <input type="submit" value="Comprar">
                </form>
                <form action="meteCarro.php" method="post">
                    <input type="hidden" name="borrar" value="<?= $datos["nombre"] ?>">
                    <br>
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        <?php
            echo "</tr>";
        }

        ?>
    </table>
</body>

</html>