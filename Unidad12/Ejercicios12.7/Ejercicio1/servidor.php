<?php
header('Content-Type: application/json; charset=utf-8');
define('pesetas', 166.386);

if (isset($_REQUEST['cantidad']) && isset($_REQUEST['tipo'])) {
    $cantidad = (float)$_REQUEST['cantidad'];
    $tipo = $_REQUEST['tipo'];
    $resultado = "";

    if ($tipo == "euros") {
        $conversion = $cantidad * pesetas;
        $resultado = round($conversion) . " pesetas";
    } elseif ($tipo == "pesetas") {
        $conversion = $cantidad / pesetas;
        $resultado = number_format($conversion, 2) . " €";
    } else {
        $resultado = "Error: tipo de moneda no válido";
    }

    echo json_encode($resultado);
} else {
    echo json_encode("Error: faltan parámetros");
}
