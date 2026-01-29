<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
require_once '../Model/Usuario.php';

$usuario = Usuario::getUsarioById($_SESSION['idUsuario'] );

$data['productos'] = $usuario->getProductoCesta();

include '../View/cesta_view.php';