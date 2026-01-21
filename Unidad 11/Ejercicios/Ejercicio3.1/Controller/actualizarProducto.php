<?php
require_once '../Model/Producto.php';
$producto = Producto::getProductoByCodigo($_REQUEST['codigo']);
// actualiza el artículo en la base de datos 
$ProductoAux = new Producto($_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['stock']);
$ProductoAux->update();
header("Location: ../Controller/index.php");
