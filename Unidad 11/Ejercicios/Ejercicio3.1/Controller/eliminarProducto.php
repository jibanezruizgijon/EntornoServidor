<?php
require_once '../Model/Producto.php';
$ProductoAux = new Producto($_POST['codigo']);
$ProductoAux->delete();
header("Location: ../Controller/index.php");
