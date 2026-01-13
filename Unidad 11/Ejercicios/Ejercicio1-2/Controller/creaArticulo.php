<?php
require_once '../Model/Articulo.php';
// inserta el Artículo en la base de datos
$ArticuloAux = new Articulo("", $_POST['titulo'], "", $_POST['contenido']);
$ArticuloAux->insert();
header("Location: ../Controller/index.php");
