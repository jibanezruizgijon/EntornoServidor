<?php
// Ejercicio4/servicio.php

require_once 'Model/Alumno.php';
require_once 'Model/Alumno-asignatura.php';
require_once 'Model/Asignatura.php';

// Configuración básica
$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$datosDevolver = [];

// Capturamos datos de PUT y DELETE que no vienen en $_REQUEST nativamente
$datosEntrada = [];
if ($metodo == 'PUT' || $metodo == 'DELETE') {
    parse_str(file_get_contents("php://input"), $datosEntrada);
}
// Unimos todo en un solo array para facilitar el uso
$params = $_REQUEST + $datosEntrada;


// --- LÓGICA DEL SERVICIO ---

switch ($metodo) {
    case 'GET':
        handleGet($params);
        break;
    case 'POST':
        handlePost($params);
        break;
    case 'PUT':
        handlePut($params);
        break;
    case 'DELETE':
        handleDelete($params);
        break;
    default:
        $codEstado = 405;
        $mensaje = "Método no permitido";
        break;
}

// --- SALIDA JSON ---
setCabecera($codEstado, $mensaje);
echo json_encode([
    'status' => $codEstado,
    'mensaje' => $mensaje,
    'datos' => $datosDevolver
]);


// --- FUNCIONES MANEJADORAS ---

function handleGet($p) {
    global $datosDevolver, $codEstado, $mensaje;

    if (isset($p['curso'])) {
        // 1. Alumnos de un grupo (curso)
        $alumnos = Alumno::getAlumnosByCurso($p['curso']);
        
        foreach ($alumnos as $alum) {
            $datosDevolver[] = [
                'matricula' => $alum->getMatricula(),
                'nombre' => $alum->getNombre() . ' ' . $alum->getApellidos(),
                'curso' => $alum->getCurso()
            ];
        }

    } elseif (isset($p['nombre_contiene'])) {
        // 2. Alumnos por nombre (contiene cadena)
        $alumnos = Alumno::getAlumnosFiltroNombre($p['nombre_contiene']);
        
        foreach ($alumnos as $alum) {
            $datosDevolver[] = [
                'matricula' => $alum->getMatricula(),
                'nombre' => $alum->getNombre(),
                'apellidos' => $alum->getApellidos()
            ];
        }

    } elseif (isset($p['asignaturas_matricula'])) {
        // 3. Asignaturas de un alumno
        $alumno = Alumno::getAlumnoByMatricula($p['asignaturas_matricula']);
        
        if ($alumno) {
            $asignaturas = $alumno->getAsignaturaMat(); // Método existente en tu modelo
            foreach ($asignaturas as $asig) {
                $datosDevolver[] = [
                    'codigo' => $asig->getCodigo(),
                    'nombre' => $asig->getNombre()
                ];
            }
        } else {
            $codEstado = 404;
            $mensaje = "Alumno no encontrado";
        }

    } else {
        $codEstado = 400;
        $mensaje = "Faltan parámetros de búsqueda (curso, nombre_contiene, asignaturas_matricula)";
    }
}

function handlePost($p) {
    global $codEstado, $mensaje;

    // Acción: Matriculación de un alumno en una asignatura
    if (isset($p['matricula']) && isset($p['codigo_asignatura'])) {
        // Verificar si existe el alumno y la asignatura sería ideal, 
        // pero asumimos que existen o que la BD dará error si hay FK.
        
        try {
            $nuevaMatricula = new Alumno_Asignatura($p['matricula'], $p['codigo_asignatura']);
            $nuevaMatricula->insert();
            $mensaje = "Matriculación realizada con éxito";
            $codEstado = 201; // Created
        } catch (Exception $e) {
            $codEstado = 500;
            $mensaje = "Error al matricular: " . $e->getMessage();
        }

    } else {
        $codEstado = 400;
        $mensaje = "Datos incompletos para matriculación";
    }
}

function handlePut($p) {
    global $codEstado, $mensaje;

    // Acción: Cambio de grupo de un alumno
    if (isset($p['matricula']) && isset($p['nuevo_curso'])) {
        
        $alumno = Alumno::getAlumnoByMatricula($p['matricula']);
        
        if ($alumno) {
            // Actualizamos solo el curso
            $alumno->setCurso($p['nuevo_curso']);
            $alumno->update(); // Este método actualiza todo el objeto en BD
            $mensaje = "Curso actualizado correctamente";
        } else {
            $codEstado = 404;
            $mensaje = "Alumno no encontrado";
        }

    } else {
        $codEstado = 400;
        $mensaje = "Faltan parámetros (matricula, nuevo_curso)";
    }
}

function handleDelete($p) {
    global $codEstado, $mensaje;

    // Acción: Borrar un alumno
    if (isset($p['matricula'])) {
        
        $alumno = Alumno::getAlumnoByMatricula($p['matricula']);
        
        if ($alumno) {
            $alumno->delete();
            $mensaje = "Alumno eliminado";
        } else {
            $codEstado = 404;
            $mensaje = "El alumno no existe, no se puede borrar";
        }

    } else {
        $codEstado = 400;
        $mensaje = "Falta la matrícula";
    }
}

function setCabecera($estado, $msg) {
    // Mapeo básico de códigos HTTP
    header("HTTP/1.1 $estado $msg");
    header("Content-Type: application/json;charset=utf-8");
}
?>