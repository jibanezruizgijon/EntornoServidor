<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Foto.php';

move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/imagen/" . $_FILES["imagen"]["name"]);
$usuario = Usuario::getUsuarioByNombre($_SESSION['nombre']);
$nuevaFoto = new Foto("", $_FILES["imagen"]["name"], $usuario->getId());
$nuevaFoto->insert();

header("Location: ../Controller/index2.php");
exit();
