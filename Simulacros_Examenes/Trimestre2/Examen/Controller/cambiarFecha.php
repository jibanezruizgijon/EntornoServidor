<?php
require_once '../Model/Ciudad.php';
require_once '../Model/Transporte.php';

if (Transporte::comprobarTransporteExistente($_POST['origen'], $_POST['destino'], $_POST['fecha'])) {
    $mensaje = "Ya existe un transporte con origen " . $_POST['origen'] . ", destino " . $_POST['destino'].  " y fecha ". $_POST['fecha'];
    header("Location:../Controller/index.php?mensaje=" . $mensaje);
} else {
    $TransporteNuevo = new Transporte($_POST['id'], $_POST['origen'], $_POST['destino'], $_POST['fecha'], $_POST['empresa']);
    $TransporteNuevo->update();
    header("Location: ../Controller/index.php");
    exit();
}
