<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
// Obtiene todos los productos
$data['productos'] = Producto::getProductos();

// Carga la vista de listado 
include '../View/indexUser_view.php';
