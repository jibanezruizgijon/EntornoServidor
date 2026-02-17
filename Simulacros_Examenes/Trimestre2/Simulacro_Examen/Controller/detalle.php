<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Foto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Like.php';

if (!isset($_SESSION['nombre'])) {
    header("Location: ../Controller/login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: ../Controller/index2.php");
    exit();
} else {
    $data['foto'] = Foto::getFotoById($_GET['id']);
    $data['usuario']  = Usuario::getUsuarioById($data['foto']->getId_usuario());

    $data['nombresLike'] = $data['foto']->getNombresUsuariosLikes();
    include '../View/detalle_view.php';
}
