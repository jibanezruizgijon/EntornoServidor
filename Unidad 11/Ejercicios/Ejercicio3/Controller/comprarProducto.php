<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_POST['comprar'])) {

    if (!isset($_SESSION['cesta'][$_POST['id']]["unidades"])) {
        $_SESSION['cesta'][$_POST['id']]["unidades"] = 0;
    }
    if ($_POST['stock'] == 0) {
    } else {
        $_SESSION['cesta'][$_POST['id']]["unidades"]++;
    }
}
header("Location: ../Controller/index.php");
