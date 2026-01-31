<?php
require_once '../Model/Cliente.php';
$ClienteAux = new Cliente($_REQUEST['id']);
$ClienteAux->delete();
header("Location: ../Controller/index.php");
