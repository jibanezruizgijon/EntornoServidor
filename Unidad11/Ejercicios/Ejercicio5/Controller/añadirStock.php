<?php
require_once '../Model/Producto.php';

$producto = Producto::getProductoById($_POST['id']);

$nuevoStock = $producto->getStock() + $_POST['añadido'];
$producto->setStock($nuevoStock);

$producto->reponer();
header("Location: ../Controller/indexAdmin.php");