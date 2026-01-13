<?php
require_once '../Model/Articulo.php';
// inserta la oferta en la base de datos
$ArticuloAux = new Articulo("", $_POST['titulo'], $_POST['fecha'], $_POST['contenido']);
$ArticuloAux->insert();
header("Location: ../Controller/index.php");
