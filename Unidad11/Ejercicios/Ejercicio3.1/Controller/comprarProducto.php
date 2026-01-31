<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_POST['comprar'])) {

    if (!isset($_SESSION['carrito'][$_POST['codigo']]["unidades"])) {
        $_SESSION['carrito'][$_POST['codigo']]["unidades"] = 0;
    }
    if ($_POST['stock'] == 0) {
    } else {
        $_SESSION['carrito'][$_POST['codigo']]["unidades"]++;
    }
}
header("Location: ../Controller/index.php");
