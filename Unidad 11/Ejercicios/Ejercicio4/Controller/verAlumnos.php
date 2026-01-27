<?php
require_once '../Model/Asignatura.php';
require_once '../Model/Alumno-asignatura.php';

$data['asignatura'] = Asignatura::getAsignaturaByCodigo($_POST['codigo']);

$data['alumnos'] =  Alumno_Asignatura::getAlumnosMatriculados($_POST['codigo']);

include '../View/alumnosMatriculados_view.php';