<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$data['productos'] = Producto::getProductos();

include '../View/carrito_view.php';
