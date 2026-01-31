<?php
require_once '../Model/Producto.php';

$data['producto'] = Producto::getProductoById($_REQUEST['id']);

include '../View/detalle_view.php';