<?php
require_once '../../Model/Alumno.php';
$AlumnoAux = new Alumno($_REQUEST['matricula']);
$AlumnoAux->delete();
header("Location: ../../Controller/index.php");
