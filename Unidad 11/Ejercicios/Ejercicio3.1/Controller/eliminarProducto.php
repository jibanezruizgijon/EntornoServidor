<?php
require_once '../Model/producto.php';
$ProductoAux = new Producto($_GET['codigo']);
$ProductoAux->delete();
header("Location: ../Controller/index.php");
