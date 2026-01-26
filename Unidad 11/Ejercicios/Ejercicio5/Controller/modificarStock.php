<?php
require_once '../Model/Producto.php';

$data['producto'] = Producto::getProductoById($_POST['id']);

include '../View/añadirStock_view.php';