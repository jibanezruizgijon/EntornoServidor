<?php
$token = "81b8e8d26d984ccaad469ecc1a7e109a";

$url = "https://api.football-data.org/v4/competitions/PD/teams";

$array_datos = [
    'http' => [
        'method' => 'GET',
        'header' => "X-Auth-Token: " . $token . "\r\n"
    ]
];

$contexto = stream_context_create($array_datos);


$respuesta = @file_get_contents($url, false, $contexto);

if ($respuesta === FALSE) {
    echo "<h1>Error de conexión</h1>";
    echo "<p>No se pudo conectar con la API. Posibles causas: Token inválido o límite de peticiones alcanzado.</p>";
} else {
    $datos = json_decode($respuesta, true);
    
    echo "<h2>Equipos de la Liga Española</h2>";
    
    if (isset($datos['teams'])) {
        foreach ($datos['teams'] as $equipo) {
            echo "<div style='display: inline-block; width: 200px; text-align: center; margin: 10px; border: 1px solid #ccc; padding: 10px;'>";
            echo "<h4>" . $equipo['shortName'] . "</h4>";
            echo "<img src='" . $equipo['crest'] . "' width='80' height='80' style='object-fit: contain;'>";
            echo "</div>";
        }
    } else {
        echo "<p>La API respondió, pero no envió equipos. Respuesta: </p>";
        var_dump($datos);
    }
}
?>