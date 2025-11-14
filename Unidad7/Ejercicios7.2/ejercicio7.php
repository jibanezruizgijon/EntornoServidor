<?php
// Se define para evitar error, pero no es necesario si se aplica en css
$color = "white";
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie("color", $color, time() + 60);
} else if(isset($_COOKIE['color'])){
    $color = $_COOKIE["color"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
    <style>
        body {
            background-color: <?= $color?>;
        }
    </style>
</head>

<body>
    <h1>Elige el color del fondo de la página</h1>

    <form action="" method="post">
        <input type="color" name="color" value="<?=$color?>">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>