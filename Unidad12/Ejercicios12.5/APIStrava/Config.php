<?php
// datos para conectar la api de strava
$clientId = '199519';
$clientSecret = 'ef1f57f4c01a247caecf693fe2c9e8f24bf3854d';
$refreshToken = 'b6166e9a363894fd7ac1f17171bd406c93f743e7';

define('CLIENT_ID', $clientId);
define('CLIENT_SECRET', $clientSecret);
define('REFRESH_TOKEN', $refreshToken);

function obtenerTokenStrava()
{
    // URL para pedir el token
    $oauthUrl = "https://www.strava.com/oauth/token";

    // Datos que se envían
    $datos = [
        'client_id' => CLIENT_ID,
        'client_secret' => CLIENT_SECRET,
        'refresh_token' => REFRESH_TOKEN,
        'grant_type' => 'refresh_token'
    ];

    // Configuración http
    $opciones = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($datos)
        ]
    ];


    $contexto = stream_context_create($opciones);

    // Ejecutamos la petición
    $response = file_get_contents($oauthUrl, false, $contexto);

    if ($response === FALSE) {
        $error="Error al conectar con Strava para obtener el token.";
    }

    $data = json_decode($response, true);

    if (isset($data['access_token'])) {
        return $data['access_token'];
    } else {
        $error="Error obteniendo token: " . print_r($data, true);
    }
}
