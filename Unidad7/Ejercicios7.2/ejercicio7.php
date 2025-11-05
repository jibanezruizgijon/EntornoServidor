<?php
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

    <form action="" method="post">
        <input type="color" name="color">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>