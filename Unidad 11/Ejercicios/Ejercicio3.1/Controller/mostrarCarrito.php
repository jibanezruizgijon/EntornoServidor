<?php
require_once '../Model/Producto.php';
$data['productos'] = Producto::getProductos();

include '../View/carrito_view.php';
