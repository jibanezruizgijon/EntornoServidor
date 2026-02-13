<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Foto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Like.php';

if (isset($_POST['cerrar'])) {
    session_destroy();
}

$data['fotos'] = Foto::getFotos();
$data['usuarios'] = Usuario::getUsuarios();
// Carga la vista de listado 
include '../View/index_view.php';
