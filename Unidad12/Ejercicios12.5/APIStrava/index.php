<?php
require_once 'Config.php';

// Inicializo las variables
$actividadesMostrar = [];
$minKm = 0;
$maxKm = 100;
if (isset($_GET['min_km'])) {
    $minKm = (float)$_GET['min_km'];
}

if (isset($_GET['max_km'])) {
    $maxKm = (float)$_GET['max_km'];
}
$limiteMostrar = 10;

// Se recogen los datos para que 
$accessToken = obtenerTokenStrava();
$url = "https://www.strava.com/api/v3/athlete/activities?per_page=200";

$opciones = [
    "http" => [
        "method" => "GET",
        "header" => "Authorization: Bearer " . $accessToken . "\r\n"
    ]
];
$contexto = stream_context_create($opciones);
$json = file_get_contents($url, false, $contexto);

if ($json !== FALSE) {
    $todasActividades = json_decode($json, true);

    // Filtra las actividades recogidas según el parámetros de km especificados
    $contador = 0;
    foreach ($todasActividades as $act) {
        $ActividadKm = $act['distance'] / 1000;

        // Se comprueba que cumpla con el requisito
        if (($ActividadKm >= $minKm) && ($ActividadKm <= $maxKm)  && $contador < $limiteMostrar) {
            $actividadesMostrar[] = $act;
            $contador++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscador de Entrenos</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <h1>Mis Entrenos</h1>

    <div class="buscador">
        <form action="index.php" method="GET">
            <label>Distancia entre:</label>
            <input type="number" class="input" name="min_km" step="any" min="0" placeholder="Min"> km
            <label>y</label>
            <input type="number" class="input" name="max_km" step="any" min="0" placeholder="Max"> km
            <input type="submit" class="boton" value="Filtrar">

            <?php if ($minKm > 0): ?>
                <a href="index.php" class="filtro" >Borrar filtro</a>
            <?php endif; ?>
        </form>
    </div>

    <?php if (!empty($actividadesMostrar)): ?>
        <p>Mostrando <?php echo count($actividadesMostrar); ?> resultados:</p>

        <?php foreach ($actividadesMostrar as $act): ?>
            <div class="actividad">
                <h3>
                    <a href="detalle.php?id=<?php echo $act['id']; ?>">
                        <?php echo $act['name']; ?>
                    </a>
                </h3>
                <p>
                    <strong>Fecha:</strong> <?php echo date("d/m/Y", strtotime($act['start_date'])); ?> |
                    <strong>Distancia:</strong> <?php echo round($act['distance'] / 1000, 2); ?> km
                </p>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <p>No se encontraron entrenamientos de más de <?php echo $minKm; ?> km  y menos de <?php echo $maxKm; ?>km en tus últimas 200 actividades.</p>
    <?php endif; ?>

</body>

</html>