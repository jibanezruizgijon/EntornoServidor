<?php
require_once '../Model/Asignatura.php';
require_once '../Model/Alumno-asignatura.php';

$data['asignatura'] = Asignatura::getAsignaturaByCodigo($_REQUEST['codigo']);

$data['alumnos'] =  Alumno_Asignatura::getAlumnosMatriculados($_REQUEST['codigo']);

include '../View/alumnosMatriculados_view.php';