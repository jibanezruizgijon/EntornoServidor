<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
require_once '../Model/Usuario.php';
// Obtiene todos los productos
$data['productos'] = Producto::getProductos();


$usuario = Usuario::getUsarioById($_SESSION['idUsuario'] );
$data['cantidad']= $usuario->cantidadEnCesta();
// Carga la vista de listado 
include '../View/indexUser_view.php';
