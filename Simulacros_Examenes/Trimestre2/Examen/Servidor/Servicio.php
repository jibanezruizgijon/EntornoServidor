<?php
require_once 'Ciudad.php';
require_once 'Transporte.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$datosDevolver = [];

// --- Método GET --- 
if ($metodo == 'GET') {
    if (isset($_REQUEST['fecha_inicio']) && isset($_REQUEST['fecha_fin'])) {
        $fechaInicio = $_REQUEST['fecha_inicio'];
        $fechaFin = $_REQUEST['fecha_fin'];
        if (strtotime($fechaFin) > strtotime($fechaInicio)) {
            $transporteObjetos = Transporte::filtrarTransporteByFecha($fechaInicio, $fechaFin);

            foreach ($transporteObjetos as $transporte) {
                $destino = Ciudad::getCiudadById($transporte->getDestino());
                $origen = Ciudad::getCiudadById($transporte->getOrigen());
                $datosDevolver[] = [
                    'origen' => $origen->getNombre(),
                    'destino' => $destino->getNombre(),
                    'empresa' => $transporte->getEmpresa(),
                    'fecha' => $transporte->getFecha()
                ];
            }
        } else {
            $codEstado = 404;
            $mensaje = "Fecha fin anterior a Fecha inicio";
        }
    } else {
        $codEstado = 400;
        $mensaje = "falta algún parámetro";
    }
    // --- Método DELETE ---
} elseif ($metodo == 'DELETE') {
    if (isset($_REQUEST['ciudad'])) {
        $ciudad = Ciudad::getCiudadByNombre($_REQUEST['ciudad']);
        if ($ciudad) {
            //$comprobacionOrigen = Transporte::comprobarTransportebyOrigen($ciudad->getId());
            //$comprobacionDestino = Transporte::comprobarTransportebyDestino($ciudad->getId());
            $comprobarDestino_Origen = Transporte::comprobarTransporte($ciudad->getId());
            if ($comprobarDestino_Origen) {
                $codEstado = 404;
                $mensaje = "Esa ciudad tiene algún transporte de origen o de destino";
            } else {
                $ciudad->delete();
            }
        } else {
            $codEstado = 404;
            $mensaje = "No existe ciudad con ese nombre";
        }
    } else {
        $codEstado = 400;
        $mensaje = "falta el parámetro ciudad";
    }
}



//CABECERA
setCabecera($codEstado, $mensaje);
if ($codEstado == 200) {
    echo json_encode($datosDevolver);
}

function setCabecera($codEstado, $mensaje)
{
    header("HTTP/1.1 $codEstado $mensaje");
    header("Content-Type: application/json;charset=utf-8");
}
