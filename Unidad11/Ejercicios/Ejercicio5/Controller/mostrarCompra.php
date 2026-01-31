<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Cesta.php';

$usuario = Usuario:: getUsarioById($_SESSION['idUsuario']);

$usuario->vaciarCesta();

include ' ../View/compraRealizada_view.php';
