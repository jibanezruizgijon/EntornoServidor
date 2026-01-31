<?php require_once '../Model/Cliente.php';

if (session_status() == PHP_SESSION_NONE) session_start();  

$total = Cliente::numeroClientes();

if (!isset($_SESSION['cantidadMostrada'])) {
    $_SESSION['cantidadMostrada'] = 5;
}

if (isset($_POST['cantidad'])) {
    $_SESSION['cantidadMostrada'] = $_POST['cantidad'];
} 

$paginas = ceil($total / $_SESSION['cantidadMostrada']);

if (isset($_GET['pagina'])) {
    $paginaActual = (int)$_GET['pagina'];
} else {
    $paginaActual = 1;
}

$inicio = ($paginaActual - 1) * $_SESSION['cantidadMostrada'];

    $data['clientes'] = Cliente::clientesPagina($inicio, $_SESSION['cantidadMostrada']);

// Carga la vista de listado 
include '../View/index_view.php';
