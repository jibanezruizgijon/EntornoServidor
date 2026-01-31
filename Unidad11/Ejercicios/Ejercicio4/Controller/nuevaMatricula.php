<?php
require_once '../Model/Alumno-asignatura.php';
require_once '../Model/Alumno.php';
$data['alumno'] = Alumno::getAlumnoByMatricula($_REQUEST['matricula']);

$data['matriculas'] = Alumno_Asignatura::getAsignaturasLibres($_REQUEST['matricula']);

include '../View/nuevaMatricula_view.php';