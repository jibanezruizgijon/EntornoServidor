<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_POST['procesar'])) {
    $fp = fopen("productosVendidos.txt", "a");

    foreach ($_SESSION['carrito'] as $productos => $datos) {
        if ($datos["unidades"] != 0) {
            $consulta = $conexion->query("SELECT * FROM articulo WHERE codigo='" . $productos . "'");
            $articulo = $consulta->fetchObject();
            fwrite($fp, $articulo->codigo . "," . $articulo->nombre . "," . $articulo->precio * 1.21 . PHP_EOL);
            $stockNuevo = $articulo->stock - $datos["unidades"];
            $actualizar = "UPDATE articulo SET stock='$stockNuevo' WHERE codigo='" . $productos . "'";
            $conexion->exec($actualizar);
        }
    }
    fwrite($fp, "Total:" . $_SESSION['total'] * 1.21  . PHP_EOL);
    fclose($fp);
    $_SESSION['carrito'] = [];
}
include "../View/compraRealizada_view.php";
