<?php
header('Content-Type: application/json; charset=utf-8');

if (!isset($_REQUEST['cantidad'])) {
   echo json_encode(["error" => "Faltan parámetros"]);
} elseif (isset($_REQUEST['cantidad'])) {
    $cantidad = (int)$_REQUEST['cantidad'];
    $cartaElegidas = [];

    if ($cantidad > 40) {
        $cantidad = 40;
    }
    $palos = ["oro", "copa", "espada", "basto"];
    $numero = ["as", "dos", "tres", "cuatro", "cinco", "seis", "siete", "sota", "caballo", "rey"];

    $carta = "";
    for ($i = 0; $i < $cantidad; $i++) {
        do {
            $carta = $numero[rand(0, count($numero) - 1)] . " de " . $palos[rand(0, count($palos) - 1)];
        } while (in_array($carta, $cartaElegidas));
        $cartaElegidas [] = $carta;
    }
    echo json_encode($cartaElegidas);
} else {
    echo json_encode("Error: faltan parámetros");
}
