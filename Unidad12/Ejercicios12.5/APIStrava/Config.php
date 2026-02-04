<?php
// DATOS DE CONEXIÓN CON STRAVA
$clientId = '199519';  
$clientSecret = 'ef1f57f4c01a247caecf693fe2c9e8f24bf3854d';
$refreshToken = '08eea2d6865d1676370a7ee7be12ed03ae27ef02';

define('CLIENT_ID', $clientId);
define('CLIENT_SECRET', $clientSecret);
define('REFRESH_TOKEN', $refreshToken);

function obtenerTokenStrava()
{
    // URL para pedir el token
    $authUrl = "https://www.strava.com/oauth/token";

    // Datos que vamos a enviar (igual que antes)
    $authData = [
        'client_id' => CLIENT_ID,
        'client_secret' => CLIENT_SECRET,
        'refresh_token' => REFRESH_TOKEN,
        'grant_type' => 'refresh_token'
    ];

    // CONFIGURACIÓN DEL CONTEXTO HTTP (Sustituye a cURL)
    // Tal como explica el tema 12.4 para peticiones POST
    $opciones = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($authData)
        ]
    ];

    // Creamos el contexto
    $contexto = stream_context_create($opciones);

    // Ejecutamos la petición
    // El 'false' es porque no usamos include_path, y luego pasamos el contexto
    $response = file_get_contents($authUrl, false, $contexto);

    if ($response === FALSE) {
        die("Error crítico al conectar con Strava para obtener el token.");
    }

    $data = json_decode($response, true);

    if (isset($data['access_token'])) {
        return $data['access_token'];
    } else {
        die("Error obteniendo token: " . print_r($data, true));
    }
}
?>