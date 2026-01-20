<?php
require_once '../Model/Producto.php';

$producto = Producto::getProductoByCodigo($_POST['codigo']);

$nuevoStock = $producto->getStock() + $_POST['añadido'];
$producto->setStock($nuevoStock);

$producto->reponer();
header("Location: ../Controller/index.php");