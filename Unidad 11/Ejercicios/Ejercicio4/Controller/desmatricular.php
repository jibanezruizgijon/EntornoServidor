<?php
require_once '../Model/escuela.php';
require_once '../Model/Alumno-asignatura.php';

$matriculacionAux = new Alumno_Asignatura($_POST['matricula'],$_POST['codigo_asignatura']);
$matriculacionAux->delete();
header("Location: verAsignaturas.php?matricula=" . $_POST['matricula']);