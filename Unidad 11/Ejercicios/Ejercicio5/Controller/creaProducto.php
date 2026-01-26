<?php
require_once '../Model/Producto.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_POST['insertar'])) {
    // sube la imagen al servidor 
    move_uploaded_file($_FILES["imgUrl"]["tmp_name"], "../View/images/" . $_FILES["imgUrl"]["name"]);
    // inserta el producto en la base de datos
    $ProductoAux = new Producto("", $_POST['nombre'], $_POST['precio'], $_FILES['imgUrl']["name"], $_POST['descripcion'], $_POST['stock']);
    $ProductoAux->insert();
}
header("Location: ../Controller/indexAdmin.php");