<?php
require_once '../../Model/Alumno.php';
// inserta al alumno en la base de datos
$AlumnoAux = new Alumno($_POST['matricula'], $_POST['nombre'], $_POST['apellidos'], $_POST['curso']);
$AlumnoAux->insert();
header("Location: ../../Controller/index.php");
