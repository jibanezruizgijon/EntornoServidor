<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_POST['procesar'])) {
    $total = 0;
    $data['productos'] = Producto::getProductos();
    foreach ($data['productos'] as $producto) {
        $codigo = $producto->getCodigo();
        if (isset($_SESSION['carrito'][$codigo]) && $_SESSION['carrito'][$codigo]['unidades'] > 0) {
            $unidades = $_SESSION['carrito'][$codigo]['unidades'];
            $precio = $producto->getPrecio();
            $subtotal = $precio * $unidades;
            $total += $subtotal;
            $nuevoStock = $producto->getStock() - $unidades;
            $producto->setStock($nuevoStock);
            $producto->reponer();
        }
    }
    $producto = Producto::procesarVenta($_SESSION['carrito'], $total);
}
$_SESSION['carrito'] = [];

include "../View/compraRealizada_view.php";
