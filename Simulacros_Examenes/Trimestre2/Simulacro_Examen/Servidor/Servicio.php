<?php
require_once 'Usuario.php';
require_once 'Foto.php';
require_once 'Like.php';

$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$datosDevolver = [];

// --- Método GET --- 
if ($metodo == 'GET') {
    if (isset($_REQUEST['nombre'])) {
        $usuario = Usuario::getUsuarioByNombre($_REQUEST['nombre']);
        if ($usuario) {
            $fotosObjetos = $usuario->getFotosByUsuario();
            foreach ($fotosObjetos as $foto) {
                $numLikes = Like::getLikesByFoto($foto->getId());
                $nombreSinExtension = pathinfo($foto->getImagen(), PATHINFO_FILENAME);
                $datosDevolver[] = [
                    'id' => $foto->getId(),
                    'imagen' => "http://localhost/EntornoServidor/Simulacros_Examenes/Trimestre2/Simulacro_Examen/Servidor/images" . $nombreSinExtension,
                    'id_usuario' => $foto->getId_usuario(),
                    'likes' => $numLikes
                ];
            }
        } else {
            $codEstado = 400;
            $mensaje = "Usuario no enecontrado";
        }
    } else {
        $codEstado = 400;
        $mensaje = "falta el parámetro nombre en la petición";
    }
    // --- Método POST ---
} else if ($metodo == 'POST') {
    $usuario = Usuario::getUsuarioByNombre($_REQUEST['nombre']);
    if ($usuario) {
        $fotosObjetos = $usuario->getFotosByUsuario();
        foreach ($fotosObjetos as $foto) {
            $datosDevolver[] = [
                'id' => $foto->getId(),
                'imagen' => $foto->getImagen(),
                'id_usuario' => $foto->getId_usuario()
            ];
        }
    } else {
        $codEstado = 400;
        $mensaje = "Usuario no enecontrado";
    }
    // Método PUT
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
    // Método DELETE
} elseif ($metodo == 'DELETE') {
    if (isset($_REQUEST['id'])) {
        $foto = Foto::getFotoById($_REQUEST['id']);
        if ($foto) {
            $foto->delete();
        } else {
            $codEstado = 404;
            $mensaje = "No existe el foto con ese id";
        }
    } else {
        $codEstado = 400;
        $mensaje = "falta el parámetro id en la petición";
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
