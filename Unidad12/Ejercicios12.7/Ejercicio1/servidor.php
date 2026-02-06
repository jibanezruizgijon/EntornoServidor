<?php
header('Content-Type: application/json; charset=utf-8');
define('pesetas', 166.386);

$codigo = 200;
$mensaje = "OK";
$resultado = 0;
$monedaDestino = "";
$cantidadInicial = $_REQUEST['cantidad']?? '';
$monedaInicial = $_REQUEST['tipo']?? '';
if (isset($_REQUEST['cantidad']) && isset($_REQUEST['tipo'])) {
    $cantidad = (float)$_REQUEST['cantidad'];
    $tipo = $_REQUEST['tipo'];

    if ($tipo == "euros") {
        $resultado = $cantidad * pesetas;
        $monedaDestino = "pesetas";
    } elseif ($tipo == "pesetas") {
        $resultado = $cantidad / pesetas;
        $monedaDestino = "euros";
    } else {
        $mensaje = "Tipo de moneda no válido";
    $codigo = 400;
    }
} else {
    $mensaje = "Faltan parámetros";
    $codigo = 400;
}
header("HTTP/1.1 $codigo $mensaje");
header("Content-Type: application/json;charset=utf-8");
echo json_encode(['resultado'=> $resultado, 'moneda_destino'=> $monedaDestino, 'cantidad_inicial'=>$cantidadInicial, 'moneda_inicial'=>$monedaInicial]);
