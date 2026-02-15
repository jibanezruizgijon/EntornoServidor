<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Foto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Like.php';

 $nuevoLike = new Like ($_REQUEST['id_foto'], $_REQUEST['id_usuario']);

 $nuevoLike->insert();

 header("Location: ../Controller/index2.php");