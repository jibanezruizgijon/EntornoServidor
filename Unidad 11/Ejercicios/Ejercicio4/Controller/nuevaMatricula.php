<?php
require_once '../Model/Alumno.php';

$data['alumno'] = Alumno::getAlumnoByMatricula($_REQUEST['matricula']);

include '../View/nuevaMatricula_view.php';