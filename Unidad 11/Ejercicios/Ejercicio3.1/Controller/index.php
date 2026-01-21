<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
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

// Limita la cantidad de clientes que se muestran
if ($totalProductos > 0) {
    $data['productos'] = array_slice($productos, $inicio, $cantidadMostrada);
} else {
    $data['productos'] = [];
}

 // Desactiva el enlace de primera página y página anterior
 // en caso de que ya esté en la primera
if ($paginaActual == 1) {
    $desactivar1 = "style='color: gray;text-decoration:none'";
} else {
    $desactivar1 = "";
}

if ($paginaActual == $paginas) {
    $desactivar2 = "style='color: gray;text-decoration:none'";
} else {
    $desactivar2 = "";
}

include '../View/index_view.php';
