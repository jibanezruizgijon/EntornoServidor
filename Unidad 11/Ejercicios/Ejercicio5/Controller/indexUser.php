<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
require_once '../Model/Usuario.php';

if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../Controller/login.php");
    exit();
}
// Obtiene todos los productos
$data['productos'] = Producto::getProductos();


$usuario = Usuario::getUsarioById($_SESSION['idUsuario']);
$data['cantidad'] = $usuario->cantidadEnCesta();
// Carga la vista de listado 
include '../View/indexUser_view.php';
