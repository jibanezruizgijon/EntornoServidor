<?php
require_once '../Model/Alumno.php';

$data['matriculado'] = Alumno::getAlumnoByMatricula($_REQUEST['matricula']);

include '../View/asignaturasAlumno_view.php';
