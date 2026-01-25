<?php
require_once '../Model/Producto.php';

$data['producto'] = Producto::getProductoByCodigo($_REQUEST['codigo']);

include '../View/añadirStock_view.php';
