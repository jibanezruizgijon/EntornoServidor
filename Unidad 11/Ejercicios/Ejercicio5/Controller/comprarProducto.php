<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
    exit();
}
require_once '../Model/Usuario.php';
require_once '../Model/Producto.php';
require_once '../Model/Cesta.php';
require_once '../Model/Carro.php';

if (Cesta::getProductoById($_SESSION['idUsuario'], $_POST['codigoProducto'])) {
    $cesta = Cesta::getCestaByIdAndCod($_SESSION['idUsuario'], $_POST['codigoProducto']);

    $cantidad = (int)$cesta->getCantidad() +1;
    
    $CestaAux = new Cesta($_SESSION['idUsuario'], $_POST['codigoProducto'], $cantidad);
    $CestaAux->añadir();
} else {
    $CestaAux = new Cesta($_SESSION['idUsuario'], $_POST['codigoProducto'], "1");
    $CestaAux->insert();
}

header("Location: ../Controller/indexUser.php");
exit();
