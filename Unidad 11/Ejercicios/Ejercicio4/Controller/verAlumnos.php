<?php
require_once '../Model/Asignatura.php';

$data['asignatura'] = Asignatura::getAsignaturaByCodigo($_POST['codigo']);

$data['alumnos'] = $data['asignaturas']-> getAlumnosMatriculados();

include '../View/AlumnosMatriculados_view.php';