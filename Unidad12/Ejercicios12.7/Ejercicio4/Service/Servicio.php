<?php
require_once 'Alumno.php';
require_once 'Alumno-asignatura.php';
require_once 'Asignatura.php';


$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$datosDevolver = [];

if ($metodo == 'GET') {
    $tipo = $_REQUEST['tipo'] ?? '';
    if ($_REQUEST['tipo'] == "alumnos") {
        $nombreBusqueda = $_REQUEST['nombre'] ?? '';
        $resultado = Alumno::getAlumnosFiltroNombre($nombreBusqueda);
        foreach ($resultado as $fila) {
            $datosDevolver['alumnos'][] = ['matricula' => $fila->getMatricula(), 'nombre' => $fila->getNombre(), 'apellidos' => $fila->getApellidos()];
        }
    } else if ($_REQUEST['tipo'] == "asignaturas") {
        $matricula = $_REQUEST['matricula'] ?? '';
        $alumno = Alumno::getAlumnoById($matricula);
        if ($alumno) {
            $resultado =  $alumno->getAsignaturaMat();

            foreach ($resultado as $fila) {
                $datosDevolver['asignaturas'][] = ['codigo' => $fila->getCodigo(), 'nombre' => $fila->getNombre()];
            }
        } else {
            $codEstado = 404;
            $mensaje = "Alumno no encontrado";
        }
    } else if ($_REQUEST['tipo'] == "grupo") {
        $grupo = $_REQUEST['grupo'] ?? '';
        $resultado = Alumno::getAlumnosByCurso($grupo);
        foreach ($resultado as $fila) {
            $datosDevolver['alumnos'][] = ['matricula' => $fila->getMatricula(), 'nombre' => $fila->getNombre(), 'curso' => $fila->getCurso()];
        }
    } else {
        $codEstado = 400;
        $mensaje = "Tipo de peticion no valida";
    }
} else if ($metodo == 'POST') {
    $matricula = $_REQUEST['matricula'] ?? null;
    $codigo = $_REQUEST['codigo'] ?? null;
    if ($matricula && $codigo) {
        $matriculacion = new Alumno_Asignatura($matricula, $codigo);
        $matriculacion->insert();
    } else {
        $codEstado = 400;
        $mensaje = "Faltan datos para la matrícula";
    }
} else if ($metodo == 'DELETE') {
    parse_str(file_get_contents("PHP://input"), $parametros);

    if (isset($parametros['matricula'])) {
        $matricula = $parametros['matricula'];
        if ($alumno = Alumno::getAlumnoById($matricula)) {
            $alumno->delete();
        } else {
            $codEstado = 400;
            $mensaje = "Alumno no encontrado";
        }
    } else {
        $codEstado = 400;
        $mensaje = "Falta la matrícula";
    }
} else if ($metodo == 'PUT') {
    parse_str(file_get_contents("PHP://input"), $parametros);
  if (isset($parametros['matricula']) && isset($parametros['grupo'])) {
        
        $matricula = $parametros['matricula'];
        $nuevoGrupo = $parametros['grupo']; // El nuevo curso/grupo

        if ($alumno = Alumno::getAlumnoById($matricula)) {
            // CORRECCIÓN: Primero cambiamos el valor en el objeto
            $alumno->setCurso($nuevoGrupo);
            
            // Luego actualizamos en la base de datos
            $alumno->update();
            $mensaje = "Grupo del alumno actualizado";
        } else {
            $codEstado = 404;
            $mensaje = "Alumno no encontrado para actualizar";
        }
    } else {
        $codEstado = 400;
        $mensaje = "Faltan datos (matricula o grupo)";
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
