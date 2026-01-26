<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();

$data['productos'] = Producto::getProductos();

// Carga la vista de listado 
include '../View/indexAdmin_view.php';
