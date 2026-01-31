<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
}

$data['productos'] = Producto::getProductos();

include '../View/cesta_view.php';