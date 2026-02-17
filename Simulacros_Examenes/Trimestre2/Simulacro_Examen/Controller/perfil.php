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

$objetoFotos = Foto::getFotosById($usuario->getId());
$data['fotos'] = [];
foreach ($objetoFotos as $foto) {
    $numLikes = Like::getLikesByFoto($foto->getId());
    $data['fotos'][] = [
        'id' => $foto->getId(),
        'imagen' => $foto->getImagen(),
        'id_usuario' => $foto->getId_usuario(),
        'numLikes' => $numLikes
    ];
}


include '../View/perfil_view.php';
