<?php
// urlencode = para que deje los espacios en vez de rellenarlo con carácteres
$url = "http://localhost/EntornoServidor/Unidad12/Ejercicios12.7/Ejercicio4/Service/Servicio.php";
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
    $datos = ["matricula" => $_REQUEST['matricula'], "codigo" => $_REQUEST['codigo']];
    hacerPeticion($datos, "POST", $url);
} else if (isset($_POST['borrar'])) {
    $datos = ["matricula" => $_REQUEST['matricula']];
    hacerPeticion($datos, "DELETE", $url);
} else if (isset($_POST['cambiaGrupo'])) {
    $datos = ["matricula" => $_REQUEST['matricula'], "grupo" => $_REQUEST['grupo']];
    hacerPeticion($datos, "PUT", $url);
}


function mostrarEstado($codEstado, $mensaje) {
        $clase = ($codEstado == 200) ? "ok" : "error";
        echo "<div class='mensaje $clase'><strong>Estado $codEstado:</strong> $mensaje</div>";
    }

function mostrarAlumnos($url, $parametros)
{
    $json_raw = @file_get_contents($url . $parametros);
    
    // Obtenemos código y mensaje
    $codEstado = isset($http_response_header) ? substr($http_response_header[0], 9, 3) : 500;
    $mensajeHeader = isset($http_response_header) ? substr($http_response_header[0], 13) : "Error";

    if ($codEstado == 200 && $json_raw) {
        $respuesta = json_decode($json_raw);

        if (isset($respuesta->alumnos) && count($respuesta->alumnos) > 0) {
            echo "<table border='1' cellpadding='10' style='border-collapse:collapse; width:80%; margin-top:10px;'>";
            echo "<tr style='background-color:#f2f2f2'><th>Matrícula</th><th>Nombre</th><th>Información Extra (Curso/Apellidos)</th></tr>";
            
            foreach ($respuesta->alumnos as $alum) {
                // A veces viene 'apellidos' y a veces 'curso', dependiendo del filtro
                $infoExtra = isset($alum->apellidos) ? $alum->apellidos : ($alum->curso ?? '-');
                
                echo "<tr>";
                echo "<td>" . $alum->matricula . "</td>";
                echo "<td>" . $alum->nombre . "</td>";
                echo "<td>" . $infoExtra . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color:orange'>No se encontraron alumnos con ese criterio.</p>";
        }
    } else {
        // Si hay error, intentamos leer el mensaje del JSON
        $msgJSON = json_decode($json_raw);
        $error = $msgJSON->mensaje ?? $mensajeHeader;
        mostrarEstado($codEstado, $error);
    }
}

// --- FUNCIÓN PARA MOSTRAR ASIGNATURAS ---
function mostrarAsignaturas($url, $parametros) 
{
    $json_raw = @file_get_contents($url . $parametros);

    $codEstado = isset($http_response_header) ? substr($http_response_header[0], 9, 3) : 500;
    $mensajeHeader = isset($http_response_header) ? substr($http_response_header[0], 13) : "Error";

    if ($codEstado == 200 && $json_raw) {
        $respuesta = json_decode($json_raw);

        if (isset($respuesta->asignaturas) && count($respuesta->asignaturas) > 0) {
            echo "<table border='1' cellpadding='10' style='border-collapse:collapse; width:50%; margin-top:10px;'>";
            echo "<tr style='background-color:#d9edf7'><th>Código Asignatura</th><th>Nombre Asignatura</th></tr>";
            
            foreach ($respuesta->asignaturas as $asig) {
                echo "<tr>";
                echo "<td>" . $asig->codigo . "</td>";
                echo "<td>" . $asig->nombre . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color:orange'>Este alumno no tiene asignaturas o no existe.</p>";
        }
    } else {
        $msgJSON = json_decode($json_raw);
        $error = $msgJSON->mensaje ?? $mensajeHeader;
        mostrarEstado($codEstado, $error);
    }
}

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
