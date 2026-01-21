<?php require_once '../Model/Cliente.php';
// Obtiene todas los clientes
$data['clientes'] = Cliente::getClientes();

$total = count($data['clientes']);
$cantidadMostrada = 5;
$paginas = ceil($total / $cantidadMostrada);

if (isset($_GET['pagina'])) {
    $paginaActual = (int)$_GET['pagina'];
} else {
    $paginaActual = 1;
}

$inicio = ($paginaActual - 1) * $cantidadMostrada;
$fin = ($inicio + $cantidadMostrada);

if ($total > 0) {
    $data['clientes'] = array_slice($data['clientes'], $inicio, $cantidadMostrada);
} else {
    $data['clientes'] = [];
}
// Carga la vista de listado 
include '../View/index_view.php';
