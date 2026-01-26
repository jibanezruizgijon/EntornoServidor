<?php
require_once '../Model/Producto.php';
$ProductoAux = new Producto($_REQUEST['id']);
$ProductoAux->delete();
header("Location: ../Controller/indexAdmin.php");