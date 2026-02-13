<?php require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();
$mensajeError = "";
if (isset($_GET['error'])) {
    if (isset($_GET['existe'])) {
        $mensajeError = "Usuario con nombre " . $_GET['nombre'] . " ya existe";
    } else {
        $mensajeError = "Usuario con nombre " . $_GET['nombre'] . " no está creado";
    }
}

$registrado = "";
if (isset($_GET['registrado'])) {
    $registrado = "Usuario registrado con exito";
}
include '../View/login_view.php';
