<?php
require_once '../Model/Producto.php';

if (isset($_POST['insertar'])) {
    // sube la imagen al servidor 
    move_uploaded_file($_FILES["imgUrl"]["tmp_name"], "../View/images/" . $_FILES["imgUrl"]["name"]);
    // inserta el producto en la base de datos
    $ProductoAux = new Producto("", $_POST['nombre'], $_POST['precio'], $_FILES['imgUrl']["name"], $_POST['descripcion']);
    $ProductoAux->insert();
}
header("Location: ../Controller/index.php");