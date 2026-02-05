<?php
require_once '../Model/Alumno.php';


$data['alumno'] = Alumno::getAlumnoByMatricula($_REQUEST['matricula']);

$data['matriculas'] = $data['alumno']->getAsignaturaMat();

include '../View/asignaturasAlumno_view.php';
