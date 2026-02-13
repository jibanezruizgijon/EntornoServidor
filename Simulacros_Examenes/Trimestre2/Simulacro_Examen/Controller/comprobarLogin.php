<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Usuario.php';
$usuario = Usuario::getUsuarioByNombre($_POST['nombre']);

if (($usuario == null)) {
    header("Location: ../Controller/login.php?error=true&nombre=" . $_POST['nombre']);
    exit();
} else {
    $_SESSION['nombre'] = $_POST['nombre'];
    header("Location: ../Controller/index2.php");
}
