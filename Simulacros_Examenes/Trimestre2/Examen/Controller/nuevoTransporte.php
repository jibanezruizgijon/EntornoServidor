<?php
require_once '../Model/Transporte.php';

$error = "";
$mensaje = "";
if (isset($_POST['origen']) && isset($_POST['destino'])) {

    if ($_POST['origen'] != $_POST['destino']) {
        if (Transporte::comprobarTransporteExistente($_POST['origen'], $_POST['destino'], $_POST['fecha'])) {
            $error = "Error al grabar el nuevo transporte";
            $mensaje = "Ya existe un transporte con este origen, destino y fecha";
            include "../View/errorNuevoTransporte_v.php";
        }
         else {
            $TransporteNuevo = new Transporte("", $_POST['origen'], $_POST['destino'], $_POST['fecha'], $_POST['empresa']);
            $TransporteNuevo->insert();
            header("Location: ../Controller/index.php");
            exit();
         }
    } else {
        $error = "Error al grabar el nuevo transporte";
        $mensaje = "El destino y el origen no pueden ser iguales";
        include "../View/errorNuevoTransporte_v.php";
    }
} else {
    $error = "Error al grabar el nuevo transporte";
    $mensaje = "Falta el parámetro de origen o destino";
    include "../View/errorNuevoTransporte_v.php";
}
