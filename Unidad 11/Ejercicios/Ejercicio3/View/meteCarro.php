<?php
if (session_status() == PHP_SESSION_NONE) session_start();

try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

$consulta = $conexion->query("SELECT * FROM tienda7 WHERE id='" . $_POST['id'] . "'");
$articulo = $consulta->fetchObject();
if (!isset($_SESSION['carro'][$articulo->id]["unidades"])) {
    $_SESSION['carro'][$articulo->id]["unidades"] = 0;
}
$_SESSION['carro'][$articulo->id]["unidades"]++;
$_SESSION['total']++;

$carritoSer = base64_encode(serialize($_SESSION['carro']));
setcookie("carro", $carritoSer, time() + 60 * 60 * 24);
$conexion = null;
if ($_POST['seleccionado']) {
    header("Location: index.php");
    exit();
}

if ($_POST['seleccionado1']) {
    header("Location: detalle.php?id=$_POST[id]");
    exit();
}
