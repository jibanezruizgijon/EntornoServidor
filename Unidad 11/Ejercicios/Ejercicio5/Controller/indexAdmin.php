<?php
require_once '../Model/Producto.php';

$data['productos'] = Producto::getProductos();

// Carga la vista de listado 
include '../View/indexAdmin_view.php';
