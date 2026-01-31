<?php
require_once '../Model/Articulo.php';
$articulo = Articulo::getArticuloById($_REQUEST['id']);
// actualiza el artículo en la base de datos 
$ArticuloAux = new Articulo($_POST['id'], $_POST['titulo'], "", $_POST['contenido']);
$ArticuloAux->update();
header("Location: ../Controller/index.php");