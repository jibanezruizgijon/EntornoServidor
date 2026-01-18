<?php require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
    $_SESSION['total'] = 0;
}

$data['productos'] = Producto::getProductos();



// Carga la vista de listado 
include '../View/index_view.php';
