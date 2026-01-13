<?php
require_once '../Model/Articulo.php';
$ArticuloAux = new Articulo($_GET['id']);
$ArticuloAux->delete();
header("Location: ../Controller/index.php");
