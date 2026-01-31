<?php
require_once '../../Model/Alumno.php';
$alumno = Alumno::getAlumnoByMatricula($_REQUEST['matricula']);
// actualiza el artículo en la base de datos 
$alumnoAux = new Alumno($_POST['matricula'], $_POST['nombre'], $_POST['apellidos'], $_POST['curso']);
$alumnoAux->update();
header("Location: ../../Controller/index.php");
