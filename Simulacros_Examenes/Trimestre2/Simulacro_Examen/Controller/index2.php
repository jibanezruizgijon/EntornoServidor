<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Foto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Like.php';

if (!isset($_SESSION['nombre'])) {
    header("Location: ../Controller/login.php");
    exit();
}


$data['fotos'] = [];
$objetoFotos = Foto::getFotos();
foreach ($objetoFotos as $foto) {
    $numLikes = Like::getLikesByFoto($foto->getId());
    $usuario = Usuario::getUsuarioById($foto->getId_usuario());
    $data['fotos'][] = [
        'id' => $foto->getId(),
        'imagen' => $foto->getImagen(),
        'id_usuario' => $foto->getId_usuario(),
        'likes' => $numLikes,
        'nombre' => $usuario->getNombre()
    ];
}

$data['usuario'] = Usuario::getUsuarioByNombre($_SESSION['nombre']);
// Carga la vista de listado 
include '../View/index2_view.php';
