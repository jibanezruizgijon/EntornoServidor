<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Usuario.php';

$usuario = Usuario::getUsuarioByNombre($_POST['nombre']);

if (($usuario != null)) {
    header("Location: ../Controller/login.php?error=true&existe=true&nombre=" . $_POST['nombre']);
    exit();
} else {
    $nuevoUsuario = new Usuario("", $_POST['nombre']);
    $nuevoUsuario->insert();
    header("Location: ../Controller/login.php?registrado=true");
    exit();
}
