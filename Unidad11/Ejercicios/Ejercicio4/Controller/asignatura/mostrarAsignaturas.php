<?php require_once '../../Model/Asignatura.php';
 // Obtiene todos los alumnos
$data['asignaturas'] = Asignatura::getAsignaturas();
 // Carga la vista de listado 
include '../../View/asignaturas_view.php';