<?php
require_once '../Model/escuela.php';
require_once '../Model/Alumno-asignatura.php';

$matriculacionAux = new Alumno_Asignatura($_POST['matricula'], $_POST['codigo_asignatura']);

if (isset($_POST['asignaturas'])) {
    $data['asignatura'] = Asignatura::getAsignaturaByCodigo($_POST['codigo_asignatura']);

    $data['alumnos'] =  Alumno_Asignatura::getAlumnosMatriculados($_POST['matricula']);
    $matriculacionAux->delete();

    header("Location: verAlumnos.php?codigo=" . $_POST['codigo_asignatura']);
    exit();
}
$matriculacionAux->delete();
header("Location: verAsignaturas.php?matricula=" . $_POST['matricula']);
