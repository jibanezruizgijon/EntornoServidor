<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Foto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Like.php';

if (!isset($_SESSION['nombre'])) {
    header("Location: ../Controller/login.php");
    exit();
}

$usuario = Usuario::getUsuarioByNombre($_SESSION['nombre']);

$data['fotos'] = Foto::getFotosById($usuario->getId());

include '../View/perfil_view.php';
