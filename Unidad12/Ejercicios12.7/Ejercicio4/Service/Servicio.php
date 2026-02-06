<?php
require_once 'Model/Alumno.php';
require_once 'Model/Alumno-asignatura.php';
require_once 'Model/Asignatura.php';


$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$datosDevolver = [];

if ($metodo == 'GET') {
    if ($_REQUEST['tipo'] == "alumnos") {
        $resultado = Alumno::getAlumnosFiltroNombre($_REQUEST['nombre']);
        foreach ($resultado as $fila) {
            $datosDevolver['alumnos'][] = ['matricula' => $fila->getMatricula(), 'nombre' => $fila->getNombre()];
        }
    } else if ($_REQUEST['tipo'] == "asignaturas") {
        $resultado = Alumno_Asignatura::getAsignaturasByAlumnos($_REQUEST['nombre']);
        foreach ($resultado as $fila) {
            $datosDevolver['alumnos'][] = ['matricula' => $fila->getMatricula(), 'nombre' => $fila->getNombre(), 'apellidos' => $fila->getApellidos()];
        }
    } else if ($_REQUEST['tipo'] == "grupo") {
        $resultado = Alumno::getAlumnosFiltroNombre($_REQUEST['nombre']);
        foreach ($resultado as $fila) {
            $datosDevolver['alumnos'][] = ['matricula' => $fila->getMatricula(), 'nombre' => $fila->getNombre()];
        }
    }
} else if ($metodo == 'POST') {
    $matriculacion = Alumno_Asignatura::ObtenerMatricula($_REQUEST['matricula'], $_REQUEST['codigo']);
    if ($matriculacion) {
    } else {

    }
} else if ($metodo == 'DELETE') {
    parse_str(file_get_contents("PHP://input"), $parametros);
    if($alumno = Alumno::getAlumnoById()){

    }
} else if ($metodo == 'PUT'){
    parse_str(file_get_contents("PHP://input"), $parametros);
    if ($alumno = Alumno::getAlumnoById()) {

    } else {
        $mensaje = "Alumno no encontrado";
        $codEstado = 400;
    }
}

setCabecera($codEstado, $mensaje);
if ($codEstado == 200) {
    echo json_encode($devolver);
}

function setCabecera($codEstado, $mensaje)
{
    header("HTTP/1.1 $codEstado $mensaje");
    header("Content-Type: application/json;charset=utf-8");
}
