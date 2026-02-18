<?php
require_once '../Model/Ciudad.php';
require_once '../Model/Transporte.php';

$data['transportes'] = [];
$objetoTransportes = Transporte::getTransportes();
if (isset($_REQUEST['filtroTransporte'])) {
    $origen = "";
    $destino = "";
    $empresa = "";
    $fecha = "";
    if(isset($_REQUEST['origen'])){
        $origen = $_REQUEST['origen'];
    }
    if(isset($_REQUEST['destino'])){
        $destino = $_REQUEST['destino'];
    }
    if(isset($_REQUEST['empresa'])){
        $empresa = $_REQUEST['empresa'];
    }
    if(isset($_REQUEST['fecha'])){
        $fecha = $_REQUEST['fecha'];
    }
    $objetoTransportes = Transporte::filtrarTransporte($origen, $destino, $empresa, $fecha);
    foreach ($objetoTransportes as $transporte) {
        $destino = Ciudad::getCiudadById($transporte->getDestino());
        $origen = Ciudad::getCiudadById($transporte->getOrigen());
        $data['transportes'][] = [
            'id' => $transporte->getId(),
            'origen' => $origen->getNombre(),
            'destino' => $destino->getNombre(),
            'fecha' => $transporte->getFecha(),
            'empresa' => $transporte->getEmpresa()
        ];
    }
}

$data['ciudades'] = Ciudad::getCiudades();

include '../View/busqueda_v.php';
