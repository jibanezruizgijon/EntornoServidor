<?php
require_once '../Model/Usuario.php';

$usuario = Usuario::getUsarioByPass($_POST['pass']);

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
