<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Cesta.php';

$cesta = Cesta::getCestaByIdAndCod($_SESSION['idUsuario'], $_POST['id_producto']);

$cantidad = (int)$cesta->getCantidad() - 1;

$CestaAux = new Cesta($_SESSION['idUsuario'], $_POST['id_producto'], $cantidad);
if ($cantidad <= 0) {
    $CestaAux->delete();
} else {
    $CestaAux->reducir();
}


$usuario = Usuario::getUsarioById($_SESSION['idUsuario']);

$data['productos'] = $usuario->getProductoCesta();

header("Location: ../Controller/mostrarCesta.php");
