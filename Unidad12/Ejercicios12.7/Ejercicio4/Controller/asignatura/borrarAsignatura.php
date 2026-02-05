<?php
require_once '../../Model/Asignatura.php';
$AsignaturaAux = new Asignatura($_REQUEST['codigo']);
$AsignaturaAux->delete();
header("Location: ../asignatura/mostrarAsignaturas.php");
