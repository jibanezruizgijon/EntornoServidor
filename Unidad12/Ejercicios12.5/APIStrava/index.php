<?php
require_once 'Config.php';

$token = obtenerTokenStrava();
$url = "https://www.strava.com/api/v3/athlete/activities?per_page=10";

// 1. PREPARAR EL CONTEXTO (Como explica el libro en el punto 12.4)
// Strava necesita que le enviemos el Token en la cabecera, si no, dará error.
$opciones = [
    "http" => [
        "method" => "GET",
        "header" => "Authorization: Bearer " . $token . "\r\n" .
                    "Content-Type: application/json"
    ]
];

// Creamos el contexto con las opciones
$contexto = stream_context_create($opciones);

// 2. HACER LA PETICIÓN 
// El tercer parámetro es el contexto que hemos creado con la autorización
$json = @file_get_contents($url, false, $contexto);

// 3. COMPROBAR ERRORES
if ($json === FALSE) {
    die("Error al conectar con Strava. Revisa tu token.");
}

// 4. DECODIFICAR JSON
$actividades = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Entrenos</title>
    </head>
<body>
    <h1>Mis Últimas Actividades</h1>
    
    <?php if (!empty($actividades)): ?>
        <?php foreach ($actividades as $act): ?>
            <div style="border:1px solid #ccc; padding:10px; margin:10px;">
                <h3>
                    <a href="detalle.php?id=<?php echo $act['id']; ?>">
                        <?php echo htmlspecialchars($act['name']); ?>
                    </a>
                </h3>
                <p>Fecha: <?php echo date("d/m/Y", strtotime($act['start_date'])); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay actividades para mostrar.</p>
    <?php endif; ?>
</body>
</html>