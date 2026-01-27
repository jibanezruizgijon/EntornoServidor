<?php
require_once '../Model/Producto.php';

$data['productos'] = Producto::getProductos();

include '../View/cesta_view.php';