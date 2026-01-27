<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Usuario.php';
$usuario = Usuario::getUsarioByPass($_POST['pass']);
if (!isset($_SESSION['idUsuario'])) {
    $_SESSION['idUsuario'] = [];
}

$_SESSION['idUsuario'] = $usuario->getId();

if (($usuario != null) && (strcmp($_POST['nombre'], $usuario->getNombre()) == 0)) {
    if ((strcmp($usuario->getRol(), 'user'))) {
        header("Location: ../Controller/indexAdmin.php");
        exit();
    } else {
        header("Location: ../Controller/indexUser.php");
        exit();
    }
    exit();
} else {
    header("Location: ../Controller/login.php");
}
