<?php
require_once '../Model/Cliente.php';
// inserta al Cliente en la base de datos
$ClienteAux = new Cliente("", $_POST['dni'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono']);
$ClienteAux->insert();
header("Location: ../Controller/index.php");
