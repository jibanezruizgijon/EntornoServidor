<?php
require_once '../Model/Producto.php';

if (isset($_POST['comprar'])) {

    if (!isset($_SESSION['carrito'][$_POST['codigo']]["unidades"])) {
        $_SESSION['carrito'][$_POST['codigo']]["unidades"] = 0;
    }
    if ($_POST['stock'] <=  $_SESSION['carrito'][$_POST['codigo']]["unidades"]) {
    } else {
        $_SESSION['carrito'][$_POST['codigo']]["unidades"]++;
    }
}
header("Location: ../Controller/index.php");
