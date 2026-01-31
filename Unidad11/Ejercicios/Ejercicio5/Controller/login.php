<?php
$mensajeError = "";
if (isset($_GET['error'])) {
    $mensajeError = "Usuario o Contraseña Incorrecto";
} 
include '../View/login_view.php';
