<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$totalProductos = Producto::numeroProductos();

if (!isset($_SESSION['cantidadMostrada'])) {
    $_SESSION['cantidadMostrada'] = 3;
}

if (isset($_POST['cantidad'])) {
    $_SESSION['cantidadMostrada'] = $_POST['cantidad'];
} 

$paginas = ceil($totalProductos / $_SESSION['cantidadMostrada']);

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


$inicio = ($paginaActual - 1) * $_SESSION['cantidadMostrada'];

// Limita la cantidad de clientes que se muestran
  $data['productos'] = Producto::productosPagina($inicio, $_SESSION['cantidadMostrada']);

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
