<?php
if (session_status() == PHP_SESSION_NONE) session_start();
require_once '../Model/Producto.php';
require_once '../Model/Usuario.php';
require_once '../Model/Cesta.php';

$usuario = Usuario::getUsarioById($_SESSION['idUsuario']);

// comprobarStockCesta();

// function comprobarStockCesta()
// {
//     $contenidoCesta = Cesta::getCestaById_cliente($_SESSION['idUsuario']);
//     foreach ($contenidoCesta as $cesta) {
//         $producto = Producto::getProductoById($cesta->getCodigo());
//         if ($producto->getStock() < $cesta->getCantidad()) {
//             if ($producto->getStock() == 0) {
//                 $cesta->delete();
//             } else {
//                 $diferencia = $producto->getStock() - $cesta->getCantidad();
//                 $cesta->añadir($diferencia);
//             }
//         }
//     }
// }

$data['productos'] = $usuario->getProductoCesta();

$data['cantidad'] = $usuario->cantidadEnCesta();

include '../View/cesta_view.php';
