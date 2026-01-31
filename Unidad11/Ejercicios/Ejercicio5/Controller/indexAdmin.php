<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';

if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../Controller/login.php");
    exit();
}

$data['productos'] = Producto::getProductos();

// Carga la vista de listado 
include '../View/indexAdmin_view.php';
