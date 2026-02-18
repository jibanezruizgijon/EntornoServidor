<?php
require_once '../Model/Ciudad.php';
require_once '../Model/Transporte.php';
$data['transportes'] = [];
$mensaje = "";
if (isset($_REQUEST['mensaje'])) {
    $mensaje = $_REQUEST['mensaje'];
}
$data['ciudades'] = [];
// Ciudades para el select
$data['ciudades'] = Ciudad::getCiudades();
$objetoTransportes = Transporte::getTransportes();

foreach ($objetoTransportes as $transporte) {
    $destino = Ciudad::getCiudadById($transporte->getDestino());
    $origen = Ciudad::getCiudadById($transporte->getOrigen());
    $data['transportes'][] = [
        'id' => $transporte->getId(),
        'origen' => $origen->getNombre(),
        'destino' => $destino->getNombre(),
        'fecha' => $transporte->getFecha(),
        'empresa' => $transporte->getEmpresa(),
        'idOrigen' => $transporte->getOrigen(),
        'idDestino' => $transporte->getDestino()
    ];
}
include '../View/index_v.php';
