<?php
require_once '../../Model/Alumno.php';
// inserta al alumno en la base de datos
if ($alumno = Alumno::getAlumnoByMatricula($_POST['matricula'])) {
    $data['mensaje'] = "El alumno con esa matrícula ya existe";
    $data['matricula'] = $_POST['matricula'];
    $data['nombre'] = $_POST['nombre'];
    $data['apellidos'] = $_POST['apellidos'];
    $data['curso'] = $_POST['curso'];
    include '../../View/creaAlumno_view.php';
} else {
    $AlumnoAux = new Alumno($_POST['matricula'], $_POST['nombre'], $_POST['apellidos'], $_POST['curso']);
    $AlumnoAux->insert();
    header("Location: ../../Controller/index.php");
    exit();
}
