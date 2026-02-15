<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Foto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Like.php';

if (isset($_POST['cerrar'])) {
    unset($_SESSION['nombre']);
}

$data['fotos'] = [];
$objetoFotos = Foto::getFotos();
foreach ($objetoFotos as $foto) {
    $numLikes = Like::getLikesByFoto($foto->getId());
    $usuario = Foto::getUsuarioById($foto->getId_usuario());
    $data['fotos'][] = [
        'id' => $foto->getId(),
        'imagen' => $foto->getImagen(),
        'id_usuario' => $foto->getId_usuario(),
        'likes' => $numLikes,
        'nombre' => $usuario->getNombre()
    ];
}

// Carga la vista de listado 
include '../View/index_view.php';
