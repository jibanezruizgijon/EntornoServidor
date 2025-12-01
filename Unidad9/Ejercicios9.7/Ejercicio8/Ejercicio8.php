<?php
include_once "Zona.php";

if (!isset($_SESSION['zonas'])) {
    $_SESSION['zonas'][] = serialize(new Zona("pirncipal", 1000, 20));
    $_SESSION['zonas'][] = serialize(new Zona("compra-venta", 200, 35));
    $_SESSION['zonas'][] = serialize(new Zona("vip", 25, 50));
}

if(isset($_REQUEST['numeroEntradas']) && ){

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<table>
    <tr>
        <td>Zona</td>
        <td>principal</td>
        <td>Compra-venta</td>
    </tr>
    <tr>
        <td>Entradas Disponibles</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Precio/Entrada</td>
        <td>20€</td>
        <td>35€</td>
        <td>50€</td>
    </tr>
</table>

<form action="" method="post">

</form>
</body>

</html>