<?php
// urlencode = para que deje los espacios en vez de rellenarlo con carácteres
$url = "http://localhost/EntornoServidor/Unidad12/Ejercicios12.7/Ejercicio4/Service/servicio.php";
if (isset($_POST['filtraGrupo'])) {
    echo "<h1>GRUPO:" . $_POST['grupo'] . "</h1>";
    $parametros = '?grupo=' . urlencode($_POST['grupo']) . "&tipo=grupo";
    mostrarAlumnos($url, $parametros);
} else if (isset($_POST['filtraAlumno'])) {
    echo "<h1> Nombre que contiene \"" . $_POST['nombre'] . "\"</h1>";
    $parametros = "?nombre=" . urlencode($_POST['nombre']) . '&tipo=alumnos';
    mostrarAlumnos($url, $parametros);
} else if (isset($_POST['filtraAsignatura'])) {
    echo "<h1> Matriculaciones del alumno " . $_POST['matricula'] . "</h1>";
    $parametros = "?matricula=" . $_POST['matricula'] . '&tipo=asignaturas';
    mostrarAsignaturas($url, $parametros);
} else if (isset($_POST['matricular'])) {
    $datos = ["matriculas" => $_REQUEST['matricula'], "codigo" => $_REQUEST['codigo']];
    hacerPeticion($datos, "POST", $url);
} else if (isset($_POST['borrar'])) {
    $datos = ["matriculas" => $_REQUEST['matricula']];
    hacerPeticion($datos, "DELETE", $url);
} else if (isset($_POST['cambiaGrupo'])) {
    $datos = ["matriculas" => $_REQUEST['matricula'], "grupo" => $_REQUEST['grupo']];
    hacerPeticion($datos, "PUT", $url);
}


function mostrarEstado($codEstado, $mensaje) {
    
}

function mostrarAlumnos($url, $parametros) {}
function mostrarAsignaturas ($url, $parametros){
  
}
