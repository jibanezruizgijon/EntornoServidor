<?php
require_once 'Config.php'; // Asegúrate que el nombre del archivo coincida (mayúsculas/minúsculas)

// 1. Verificamos si nos han pasado un ID
if (!isset($_GET['id'])) {
    die("Error: No has seleccionado ningún entrenamiento.");
}

$actividadId = $_GET['id'];
$accessToken = obtenerTokenStrava();

// 2. Pedimos los datos DETALLADOS
$url = "https://www.strava.com/api/v3/activities/" . $actividadId;

// --- CAMBIO: SUSTITUIMOS CURL POR STREAM_CONTEXT (Método del Libro) ---

// Definimos las opciones de la cabecera HTTP
$opciones = [
    "http" => [
        "method" => "GET",
        "header" => "Authorization: Bearer " . $accessToken . "\r\n"
    ]
];

// Creamos el contexto
$contexto = stream_context_create($opciones);

// Hacemos la petición
// El @ delante sirve para que no salga un "Warning" feo en pantalla si la petición falla (ej: error 404)
$response = @file_get_contents($url, false, $contexto);

if ($response === FALSE) {
    // Si file_get_contents falla, devolvió FALSE
    die("Error: No se pudo cargar la actividad. Puede que el ID no exista o el token haya fallado.");
}

$detalle = json_decode($response, true);

function msKmh($velocidadMS)
{
    return number_format($velocidadMS * 3.6, 1) . " km/h";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Entreno</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background: #f4f4f9;
        }

        .ficha {
            background: white;
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .dato-grande {
            font-size: 2em;
            font-weight: bold;

        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }

        .caja-dato {
            background: #eee;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .volver {
            display: block;
            margin-top: 20px;
            color: black;
            text-decoration: none;
        }

        .volver:hover{
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="ficha">
        <small>Entrenamiento detallado</small>
        <h1><?php echo isset($detalle['name']) ? htmlspecialchars($detalle['name']) : 'Actividad sin nombre'; ?></h1>

        <?php if (isset($detalle['start_date_local'])): ?>
            <p><?php echo date("l, d F Y \a \l\a\s H:i", strtotime($detalle['start_date_local'])); ?></p>
        <?php endif; ?>

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
                <span class="dato-grande"><?php echo msKmh($detalle['max_speed']); ?></span>
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