<?php require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();
// Obtiene todos los productos
$data['productos'] = Producto::getProductos();

if (isset($_COOKIE['carro']) && !isset($_SESSION['carro'])) {
    $_SESSION['carro'] = unserialize(base64_decode($_COOKIE['carro']));
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

// Carga la vista de listado 
include '../View/index_view.php';
