<?php
require_once 'FotografiasDB.php';
require_once 'Usuario.php';
require_once 'Foto.php';
require_once 'Like.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$datosDevolver = [];


if ($metodo == 'GET') {
    if (isset($_REQUEST['nombre'])) {
        $usuario = Usuario::getUsuarioByNombre($_REQUEST['nombre']);
        if ($usuario) {
            $datosDevolver[] = $usuario->getFotosByUsuario();
        } else {
            $codEstado = 400;
            $mensaje = "Usuario no enecontrado";
        }
    } else {
        $codEstado = 400;
        $mensaje = "falta el parámetro nombre en la petición";
    }
} else if ($metodo == 'POST') {
    $usuario = Usuario::getUsuarioByNombre($_REQUEST['nombre']);
    if ($usuario) {
        $datosDevolver = $usuario->getFotosByUsuario();
    } else {
        $codEstado = 400;
        $mensaje = "Usuario no enecontrado";
    }
} else if ($metodo == 'PUT') {
    parse_str(file_get_contents("PHP://input"), $parametros);
    if (isset($parametros['id_foto']) && isset($parametros['id_usuario'])) {
        $usuario = Usuario::getUsuarioById($parametros['id_usuario']);
        if ($usuario) {
            $foto = Foto::getFotoById($parametros['id_foto']);
            if ($foto) {
                $FotoAux = new Foto($parametros['id_foto'], $foto->getImagen(), $parametros['id_usuario']);
                $FotoAux->update();
            } else {
                $codEstado = 404;
                $mensaje = "No existe el foto con ese id";
            }
        } else {
            $codEstado = 404;
            $mensaje = "No existe el usuario con ese id";
        }
    } else {
        $codEstado = 400;
        $mensaje = "falta el id de usaurio o el id de foto";
    }
}

setCabecera($codEstado, $mensaje);
if ($codEstado == 200) {
    echo json_encode($datosDevolver);
}

function setCabecera($codEstado, $mensaje)
{
    header("HTTP/1.1 $codEstado $mensaje");
    header("Content-Type: application/json;charset=utf-8");
}
