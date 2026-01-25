<?php
require_once '../Model/Producto.php';

$data['producto'] = Producto::getProductoByCodigo($_REQUEST['codigo']);

include '../View/actualizarProducto_view.php';
