<?php require_once '../Model/Alumno.php';
 // Obtiene todos los alumnos
$data['alumnos'] = Alumno::getAlumnos();
 // Carga la vista de listado 
include '../View/index_view.php';