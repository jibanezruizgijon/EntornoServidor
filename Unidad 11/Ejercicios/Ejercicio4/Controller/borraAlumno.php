<?php
require_once '../Model/Alumno.php';
$AlumnoAux = new Alumno($_GET['matricula']);
$AlumnoAux->delete();
header("Location: ../Controller/index.php");
