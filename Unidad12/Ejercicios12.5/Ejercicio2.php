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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            text-align: center;
        }

        img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .card__equipo {
            display: inline-block;
            width: 200px;
            text-align: center;
            margin: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .card__equipo:hover{
            background-color: #ffeeee;
        }

        a {
            text-decoration: none;
            color: inherit;
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

        echo "<h2>Equipos de la Liga Española</h2>";

        if (isset($datos['teams'])) {
            foreach ($datos['teams'] as $equipo) {
    ?>
                <a href="Ejercicio2.2.php?id=<?= $equipo['id'] ?>">
                    <div class="card__equipo">
                        <h4><?= $equipo['shortName'] ?></h4>
                        <img src="<?= $equipo['crest'] ?>">
                    </div>
                </a>
    <?php

            }
        } else {
            echo "<p>La API respondió, pero no envió equipos.</p>";
            print_r($datos['teams']);
        }
    }
    ?>
</body>

</html>