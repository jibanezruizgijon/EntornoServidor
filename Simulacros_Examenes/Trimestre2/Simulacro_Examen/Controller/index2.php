<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Foto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Like.php';

if (!isset($_SESSION['nombre'])) {
    header("Location: ../Controller/login.php");
    exit();
}

$fotos = Foto::getFotos();;
foreach ($fotos as $foto) {
    $autor = Usuario::getUsarioById($foto->getId_usuario());
    $likes = Like::getLikesByFoto($foto->getId());
    $data['fotos'][] = ['id' => $foto->getId(), 'imagen' => $foto->getImagen(), 'autor' => $autor, 'likes' => $likes];
}

$data['fotos'] = Foto::getFotos();
$data['usuarios'] = Usuario::getUsuarios();
// Carga la vista de listado 
include '../View/index2_view.php';
