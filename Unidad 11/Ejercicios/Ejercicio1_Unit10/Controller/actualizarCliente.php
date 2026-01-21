<?php
require_once '../Model/Cliente.php';
$cliente = Cliente::getClienteById($_REQUEST['id']);
// actualiza el cliente en la base de datos 
$ClienteAux = new Cliente("", $_POST['dni'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono']);
$ClienteoAux->update();
header("Location: ../Controller/index.php");
