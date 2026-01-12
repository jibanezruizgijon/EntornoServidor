<?php
require_once '../Model/Oferta.php';
$ofertaAux = new Oferta($_GET['id']);
$ofertaAux->delete();
header("Location: ../Controller/index.php");
