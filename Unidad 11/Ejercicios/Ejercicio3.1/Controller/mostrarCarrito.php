<?php
require_once '../Model/Producto.php';
$data['producto'] = Producto::getProductos();


include '../View/carrito_view.php';
