<?php
require_once '../Model/Producto.php';
// inserta el producto en la base de datos
$ProductoAux = new Producto("", $_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['stock']);
$ProductoAux->insert();
header("Location: ../Controller/index.php");
