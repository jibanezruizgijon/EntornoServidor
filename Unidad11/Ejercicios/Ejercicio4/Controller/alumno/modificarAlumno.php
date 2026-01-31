<?php
require_once '../../Model/Alumno.php';

$data['alumno'] = Alumno::getAlumnoByMatricula($_REQUEST['matricula']);

include '../../View/modificarAlumno_view.php';
