<?php
require_once 'Config.php'; 

$error = "";
if (!isset($_GET['id'])) {
    $error="Error: No has seleccionado ningún entrenamiento.";
}

$actividadId = $_GET['id'];
$accessToken = obtenerTokenStrava();

// Se piden los datos del entreno específico
$url = "https://www.strava.com/api/v3/activities/" . $actividadId;

$opciones = [
    "http" => [
        "method" => "GET",
        "header" => "Authorization: Bearer " . $accessToken . "\r\n"
    ]
];

// Creamos el contexto
$contexto = stream_context_create($opciones);

// Se hace la petición
$response = @file_get_contents($url, false, $contexto);

if ($response === FALSE) {
  
    $error="Error: No se pudo cargar la actividad. Puede que el ID no exista o el token haya fallado.";
}

$detalle = json_decode($response, true);

// Se pasa de metros por segundo a km/h
function cambioKm($velocidadMS)
{
    return round($velocidadMS * 3.6, 1) . " km/h";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Entreno</title>
  <link rel="stylesheet" href="css/detalle.css">
</head>

<body>

    <div class="ficha">
        <small>Entrenamiento detallado</small>
        <h1><?php echo isset($detalle['name']) ? $detalle['name'] : 'Actividad sin nombre'; ?></h1>

        <?php if (isset($detalle['start_date_local'])){?>
            <p><?php echo date("d/m/Y  H:i", strtotime($detalle['start_date_local'])); ?></p>
        <?php }?>

        <hr>

        <div class="grid">
            <div class="caja-dato">
                <span>Distancia</span><br>
                <span class="dato-grande"><?php echo round($detalle['distance'] / 1000, 2); ?> km</span>
            </div>
            <div class="caja-dato">
                <span>Tiempo Mov.</span><br>
                <span class="dato-grande"><?php echo gmdate("H:i:s", $detalle['moving_time']); ?></span>
            </div>

            <div class="caja-dato">
                <span>Desnivel +</span><br>
                <span class="dato-grande"><?php echo $detalle['total_elevation_gain']; ?> m</span>
            </div>
            <div class="caja-dato">
                <span>Calorías</span><br>
                <span class="dato-grande">
                    <?php echo $detalle['calories'] ?> kcal
                </span>
            </div>

            <div class="caja-dato">
                <span>Velocidad Max</span><br>
                <span class="dato-grande"><?php echo cambioKm($detalle['max_speed']); ?></span>
            </div>
            <div class="caja-dato">
                <span>Cadencia media</span><br>
                <span class="dato-grande">
                    <?php
                    echo (isset($detalle['average_cadence']))? $detalle['average_cadence'] . " ppm" : "N/D";
                    ?>
                </span>
            </div>
        </div>

        <br>
        <a href="index.php" class="volver">Volver al listado</a>
    </div>

</body>

</html>