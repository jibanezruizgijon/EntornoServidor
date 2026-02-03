<?php
if (!isset($_REQUEST['id'])) {
    header('Location: Ejercicio2.php');
    exit();
}

$token = "81b8e8d26d984ccaad469ecc1a7e109a";
$id = $_REQUEST['id'];
$url = "https://api.football-data.org/v4/teams/$id";

$array_datos = [
    'http' => [
        'method' => 'GET',
        'header' => "X-Auth-Token: " . $token . "\r\n"
    ]
];

$contexto = stream_context_create($array_datos);
$respuesta = @file_get_contents($url, false, $contexto);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .enlace{
            position: fixed;
            top: 10%;
            right: 10%;
            font-size: 1.6rem;
            text-decoration: none;
            color: black;
        }

        .enlace:hover{
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    if ($respuesta === FALSE) {
        echo "<h1>Error de conexión</h1>";
        echo "<p>No se pudo conectar con la API</p>";
    } else {
        $datos = json_decode($respuesta, true);

        if (isset($datos)) {
    ?>
            <div class="card__equipo">
                <h4><?= $datos['name'] ?></h4>
                <img src="<?= $datos['crest'] ?>">
            </div>
            <h3>Plantilla de jugadores:</h3>
            <ul>
                <?php
                foreach ($datos['squad'] as $jugador) {
                ?>
                    <li><?= $jugador['name'] ?> - <?= $jugador['position'] ?></li>
                <?php
                }
                ?>
            </ul>
    <?php
        } else {
            echo "<p>La API respondió, pero no envió equipos. Respuesta: </p>";
            var_dump($datos);
        }
    }
    ?>

    <a  class="enlace" href="Ejercicio2.php">Volver</a>
</body>

</html>