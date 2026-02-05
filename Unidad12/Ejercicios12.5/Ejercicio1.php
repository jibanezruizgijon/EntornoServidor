<?php
$ciudades = [
    "Almería",
    "Cádiz",
    "Córdoba",
    "Granada",
    "Huelva",
    "Jaén",
    "Málaga",
    "Sevilla"
];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>El tiempo en Andalucía</title>
    <style>
        .provincia {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            width: 200px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>El tiempo en las capitales de Andalucía</h1>

    <form action="" method="post">
        <select name="ciudad">
            <?php foreach ($ciudades as $ciudad): ?>
                <option value="<?= $ciudad ?>"><?= $ciudad ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_POST['ciudad'])) {
        $ciudad = $_POST['ciudad'];
        $apiKey = "b5df264929e6aa48bbefe3589b853aec";
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$ciudad,ES&appid=$apiKey&units=metric&lang=es";

        $datos = @file_get_contents($url);
        if ($datos) {
            $tiempo = json_decode($datos);
            echo "<div class='provincia'>";
            echo "<h3>" . $tiempo->name . "</h3>";
            echo "<img src='http://openweathermap.org/img/w/" . $tiempo->weather[0]->icon . ".png'>";
            echo "<p><strong>Temp:</strong> " . $tiempo->main->temp . " ºC</p>";
            echo "<p><strong>Humedad:</strong> " . $tiempo->main->humidity . "%</p>";
            echo "<p><strong>Cielo:</strong> " . ucfirst($tiempo->weather[0]->description) . "</p>";
            echo "</div>";
            

        } else {
            echo "<div class='provincia' style='color:red'>Error al cargar $ciudad</div>";
        }
    }
    
    ?>
</body>

</html>