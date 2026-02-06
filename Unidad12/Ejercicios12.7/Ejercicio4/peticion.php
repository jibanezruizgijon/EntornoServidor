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


function mostrarEstado($codEstado, $mensaje)
{
    echo "STARUS:" . $codEstado;
    echo "";
}

function mostrarAlumnos($url, $parametros)
{
    $data = @file_get_contents($url . $parametros);
    $respuesta = json_decode($data);
    $codEstado = substr($http_response_header[0], 9, 3);
    $mensaje = substr($http_response_header[0], 13);
    if ($codEstado == 200) {
        echo "<table border='1'><tr><th>Nombre</th><th>Precio</th><th>stock</th></tr>";
        foreach ($respuesta as $producto) {
            echo "<tr><td>" . $producto->nombre . "</td>";
            echo "<td>" . $producto->precio . "</td>";
            echo "<td>" . $producto->stock . "</td></tr>";
        }
        echo "</table>";
    } else {
        mostrarEstado($codEstado, $mensaje);
    }
}
function mostrarAsignaturas($url, $parametros) {}

function hacerPeticion($datos, $metodo, $url)
{
    $opciones = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => $metodo,
            "content" => http_build_query($datos)
        ],
    ];
    $contexto = stream_context_create($opciones);
    @file_get_contents($url, false, $contexto);
    $codEstado = substr($http_response_header[0], 9, 3);
    $mensaje = substr($http_response_header[0], 13);
    mostrarEstado($codEstado, $mensaje);
}
