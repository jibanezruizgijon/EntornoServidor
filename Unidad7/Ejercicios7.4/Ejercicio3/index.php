<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_COOKIE['carro']) && !isset($_SESSION['carro'])) {
    $_SESSION['carro'] = unserialize(base64_decode($_COOKIE['carro']));
}
// Cuando se inicia por primera vez
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [
        ["nombre" => "ratón", "precio" => 10, "img" => "img/raton.jpg", "descripcion" => " Su función principal es seleccionar, arrastrar y hacer clic en opciones de manera intuitiva"],
        ["nombre" => "teclado", "precio" => 15, "img" => "img/teclado.avif", "descripcion" => "Se utiliza principalmente para introducir texto, datos y comandos específicos en la computadora"],
        ["nombre" => "monitor", "precio" => 100, "img" => "img/monitor.jpg", "descripcion" => "Su función es mostrar de forma visual la información y los datos procesados por la computadora"],
        ["nombre" => "dualsense", "precio" => 80, "img" => "img/dualsense.jpg", "descripcion" => "Es el mando inalámbrico oficial de la consola PlayStation 5"],
    ];
}
if (!isset($_SESSION['carro'])) {
    $_SESSION['carro'] = [];
}
// Cuenta la cantidad de productos que hay en la cesta
$suma = 0;
foreach ($_SESSION['carro'] as $producto => $cantidad) {
    $suma += $cantidad;
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
            </td>
        <?php
            echo "</tr>";
        }
        print_r($_SESSION['carro']);
        ?>
    </table>
</body>

</html>