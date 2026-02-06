<?php
header('Content-Type: application/json; charset=utf-8');
$codigo = 200;
$mensaje = "OK";
$cartasEnviar = [];
if (!isset($_REQUEST['cantidad'])) {
   $mensaje = "error, Faltan parámetros";
} elseif (isset($_REQUEST['cantidad'])) {
    $cantidad = (int)$_REQUEST['cantidad'];

    if ($cantidad > 40) {
        $cantidad = 40;
    } elseif ($cantidad < 1) {
        $cantidad = 1;
    }

    $palos = ["oro", "copa", "espada", "basto"];
    $numero = ["as", "dos", "tres", "cuatro", "cinco", "seis", "siete", "sota", "caballo", "rey"];

    $carta = "";
    for ($i = 0; $i < $cantidad; $i++) {
        do {
            $carta = $numero[rand(0, count($numero) - 1)] . " de " . $palos[rand(0, count($palos) - 1)];
        } while (in_array($carta, $cartasEnviar));
        $cartasEnviar [] = $carta;
    }
} else {
    $codigo = 400;
    $mensaje = "El parámetro número de cartas es obligatorio";
}
header("HTTP/1.1 $codigo $mensaje");
header("Content-Type: application/json;charset=utf-8");
echo json_encode($cartasEnviar);
