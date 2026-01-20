<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
    $_SESSION['total'] = 0;
}


$productos = Producto::getProductos();

$totalProductos = count($productos);
$cantidadMostrada = 3;
$paginas = ceil($totalProductos / $cantidadMostrada);

// Validar página actual
if (isset($_GET['pagina'])) {
    $paginaActual = $_GET['pagina'];
    if ($paginaActual < 1) {
        $paginaActual = 1;
    }
    if ($paginaActual > $paginas) {
        $paginaActual = $paginas;
    }
} else {
    $paginaActual = 1;
}


$inicio = ($paginaActual - 1) * $cantidadMostrada;

if ($totalProductos > 0) {
    $data['productos'] = array_slice($productos, $inicio, $cantidadMostrada);
} else {
    $data['productos'] = [];
}

include '../View/index_view.php';
?>

